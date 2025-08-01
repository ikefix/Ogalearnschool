<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CoursePayment;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CoursePaymentController extends Controller
{
    public function preview($slug)
    {
        $course = Course::where('slug', $slug)->with('author')->firstOrFail();
        return view('student.course-preview', compact('course'));
    }

    public function redirectToGateway(Course $course)
    {
        $student = auth()->user();
        $amount = $course->price * 100;

        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))->post('https://api.paystack.co/transaction/initialize', [
            'email' => $student->email,
            'amount' => $amount,
            'callback_url' => route('student.course.callback'),
            'metadata' => [
                'course_id' => $course->id,
                'student_id' => $student->id,
            ]
        ]);

        if ($response->successful()) {
            return redirect($response->json()['data']['authorization_url']);
        }

        return back()->with('error', 'Unable to initiate payment');
    }

    public function handleGatewayCallback(Request $request)
    {
        $reference = $request->query('reference');

        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))
            ->get("https://api.paystack.co/transaction/verify/{$reference}");

        if ($response->successful() && $response->json()['data']['status'] === 'success') {
            $data = $response->json()['data'];
            $metadata = $data['metadata'];

            // Save only if not already saved
            if (!CoursePayment::where('reference', $reference)->exists()) {
                CoursePayment::create([
                    'student_id' => $metadata['student_id'],
                    'course_id' => $metadata['course_id'],
                    'reference' => $reference,
                    'amount' => $data['amount'] / 100,
                    'status' => 'success',
                ]);
            }

            return redirect()->route('student.dashboard')->with('success', 'Payment successful! Course unlocked.');
        }

        return redirect()->route('student.dashboard')->with('error', 'Payment failed or canceled.');
    }
}
