<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SchoolRegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\School\AssignmentController;
use App\Http\Controllers\Student\StudentAssignmentController;
use App\Http\Controllers\Student\StudentScoreController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\SchoolCourseController;
use App\Http\Controllers\LiveClassController;
use App\Http\Controllers\CourseAssetController;
use App\Http\Controllers\School\SubmissionReviewController;

use App\Events\EphemeralMessageEvent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/learn-with-ogalearn', function () {
    if (auth()->check()) {
        $user = auth()->user();

        // Redirect based on role (optional logic)
        if ($user->role === 'student') {
            return redirect('/student/dashboard');
        } elseif ($user->role === 'school') {
            return redirect('/school/dashboard');
        }

        // Default fallback
        return redirect('/dashboard');
    }

    return redirect('/login');
})->name('learn.with.ogalearn');




// ROUTES FOR DASHBOARDS
Route::get('/student/dashboard', function () {
    return view('student.dashboard');
})->middleware(['auth', 'student'])->name('student.dashboard');


Route::get('/school/dashboard', function () {
    return view('school.dashboard');
})->middleware(['auth', 'school'])->name('school.dashboard');


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth']);

Route::get('/super-admin/dashboard', function () {
    return view('super_admin.dashboard');
})->middleware(['auth']);









// School registration routes

// Show custom school registration form
Route::get('/register-school', [SchoolRegisterController::class, 'showRegistrationForm'])->name('register.register-school');

// Handle custom school registration form submission
Route::post('/register-school', [SchoolRegisterController::class, 'register'])->name('register.school');

// Protected school dashboard route (optional placeholder)









// FOR PROFILE PICTURE
// Student Profile Picture Page

Route::get('/student/profile-picture', [ProfileController::class, 'studentForm'])
    ->middleware('auth')
    ->name('student.profile.picture');

Route::get('/school/profile-picture', [ProfileController::class, 'schoolForm'])
    ->middleware('auth')
    ->name('school.profile.picture');

Route::post('/profile-picture/upload', [ProfileController::class, 'upload'])
    ->middleware('auth')
    ->name('profile.picture.upload');

// Route::get('/student/profile-picture', [ProfileController::class, 'studentForm'])->middleware('auth')->name('student.profile.picture');
// Route::get('/school/profile-picture', [ProfileController::class, 'schoolForm'])->middleware('auth')->name('school.profile.picture');

Route::delete('/profile-picture/delete', [ProfileController::class, 'delete'])
    ->middleware('auth')
    ->name('profile.picture.delete');





// ROUTES FOR STUDENTS PAGE
Route::middleware(['auth'])->group(function () {
    Route::get('/school/students', [SchoolController::class, 'students'])->name('school.students');
});



// ROUTES FOR COURSES PAGE

Route::middleware('auth')->group(function () {
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store');
});

Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');




// STUDENTS COURSE VIEW

Route::get('/student/courses', [StudentCourseController::class, 'index'])->name('student.courses');
Route::get('/student/courses/{slug}', [StudentCourseController::class, 'show'])->name('student.show');


Route::get('/school/courses', [SchoolCourseController::class, 'index'])->name('school.courses');
Route::get('/school/courses/{slug}', [SchoolCourseController::class, 'show'])->name('school.show');




// FOR COMMENTS
Route::post('/student/courses/{id}/comment', [StudentCourseController::class, 'postComment'])->name('student.course.comment');






// ROUTES FOR SCHOOL

// All routes should go in a middleware group if you later secure it for schools only
Route::get('/school/manage-courses', [SchoolCourseController::class, 'manage'])
    ->name('school.courses.manage');

Route::post('/school/courses/{id}/publish', [SchoolCourseController::class, 'publish'])
    ->name('school.courses.publish');

Route::post('/school/courses/{id}/disable', [SchoolCourseController::class, 'disable'])
    ->name('school.courses.disable');




// FOR VIEWS
Route::post('/courses/{id}/track-view', function ($id) {
    $course = \App\Models\Course::find($id);

    if (!$course) {
        return response()->json(['error' => 'Course not found'], 404);
    }

    // Optional security check:
    if (auth()->user()->role !== 'student' || auth()->user()->school_id !== $course->school_id) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    $course->increment('views');

    return response()->json(['message' => 'View counted']);
})->middleware('auth'); // only logged-in users can send view counts





// FOR LIKE BUTTOn
Route::post('/student/course/{id}/like', [StudentCourseController::class, 'like'])->name('student.like.course');
Route::post('/student/course/{id}/unlike', [StudentCourseController::class, 'unlike'])->name('student.unlike.course');


// ROUTE FOR LIVE CLASS

// routes/web.php
Route::post('/chat/send', function (Request $request) {
    broadcast(new \App\Events\EphemeralMessageEvent(auth()->user(), $request->message))->toOthers();
    return response()->json(['status' => 'sent']);
})->name('ephemeral.send')->middleware('auth');


Route::get('/student/chat-room', function () {
    return view('student.chat-room');
})->name('student.chat-room')->middleware('auth');


Route::get('/school/chat-room', function () {
    return view('school.chat-room');
})->name('school.chat-room')->middleware('auth');






// FOR LIVE CLASS


// Route::get('/school/live-class', function () {
//     return view('school.live-class');
// })->middleware(['auth']);


Route::get('/school/live-class', function () {
    $room = 'LiveClass_' . auth()->id() . '_' . now()->format('YmdHis');
    return view('school.live-class', compact('room'));
});


Route::get('/student/live-class', function () {
    $room = 'LiveClass_' . auth()->id() . '_' . now()->format('YmdHis');
    return view('student.live-class', compact('room'));
});



// for live class


Route::middleware(['auth'])->group(function () {
    Route::get('/school/live-classes', [LiveClassController::class, 'index'])->name('school.live-classes.index');
    Route::post('/school/live-classes', [LiveClassController::class, 'store'])->name('live-classes.store');
    Route::get('/live-classes/school/{id}', [LiveClassController::class, 'join'])->name('live-classes.school');
    Route::get('/live-classes/student/{id}', [LiveClassController::class, 'join2'])->name('live-classes.student');

    Route::post('/live-classes/{id}/end', [LiveClassController::class, 'end'])->name('live-classes.end');

    Route::get('/student/live-classes', [LiveClassController::class, 'studentIndex'])->name('student.live-classes.index');
});






// SCHOOL ASSETS


Route::get('/school/assets', [CourseAssetController::class, 'index'])->name('school.assets');

// Show form for uploading asset for a specific course
Route::get('/school/assets/{course}', [CourseAssetController::class, 'showForm'])->name('course-assets.form');

Route::post('/course-assets/store/{course}', [CourseAssetController::class, 'store'])->name('course-assets.store');





// STUDENTS ASSETS


Route::get('/student/assets', [CourseAssetController::class, 'studentIndex'])->name('student.assets.index');
Route::get('/student/assets/{course}', [CourseAssetController::class, 'studentView'])->name('student.assets.view');













// ROUTES FOR ASSIGNMENTS

// routes/web.php

// For school (create/delete)
Route::get('/assignments', [AssignmentController::class, 'index'])->name('school.assignments.index');
    Route::get('/assignments/create', [AssignmentController::class, 'create'])->name('school.assignments.create');
    Route::post('/assignments', [AssignmentController::class, 'store'])->name('school.assignments.store');
    Route::delete('/assignments/{assignment}', [AssignmentController::class, 'destroy'])->name('school.assignments.destroy');

// For student (view/submit)

Route::middleware(['auth'])->group(function () {
    Route::get('student/assignments', [StudentAssignmentController::class, 'index'])->name('student.assignments.index');
    Route::get('student/assignments/{assignment}', [StudentAssignmentController::class, 'show'])->name('student.assignments.show');
    Route::post('student/assignments/{assignment}/submit', [StudentAssignmentController::class, 'submit'])->name('student.assignments.submit');
});





// ROUTES FOR scores REVIEW


Route::prefix('school')->group(function () {
    Route::get('submissions', [SubmissionReviewController::class, 'index'])->name('school.submissions.index');
    Route::post('submissions/{submission}/status', [SubmissionReviewController::class, 'updateStatus'])->name('school.submissions.updateStatus');
});


Route::get('student/scores', [StudentScoreController::class, 'index'])->name('student.scores.index');
