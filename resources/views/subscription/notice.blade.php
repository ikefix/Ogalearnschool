@extends('layouts.student')

@section('studentcontent')
<div class="text-center py-5">
    <h2>🚫 Access Restricted</h2>
    <p>Your subscription has expired</p>
    <p>Kindly Subcribe For Premium Packages</p>
    <a href="{{ route('subscription.plans') }}" class="btn btn-primary">Subscribe Now</a>
</div>
@endsection
