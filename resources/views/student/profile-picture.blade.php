@extends('layouts.student')

{{-- @section('title', 'Student Dashboard') --}}

@section('studentcontent')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Upload Profile Picture</div>

                <div class="card-body text-center">

                    {{-- Show current profile photo --}}
                    @php
                        $user = auth()->user();
                    @endphp

                    <div class="mb-4">
                        @if ($user->profile_photo)
                            <img src="{{ asset('storage/' . $user->profile_photo) }}" 
                                 alt="Profile Picture" 
                                 class="rounded-circle shadow" 
                                 width="150" height="150"
                                 style="object-fit: cover;">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&size=150" 
                                 alt="Default Avatar" 
                                 class="rounded-circle shadow" 
                                 width="150" height="150"
                                 style="object-fit: cover;">
                        @endif
                    </div>

                    {{-- Upload form --}}
                    <form action="{{ route('profile.picture.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 text-start">
                            <label for="profile_photo" class="form-label">Choose Profile Photo</label>
                            <input type="file" name="profile_photo" class="form-control @error('profile_photo') is-invalid @enderror" required>
                            @error('profile_photo')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update Picture</button>
                    </form>

                   <form action="{{ route('profile.picture.delete') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your profile picture?');">
                    @csrf
                    @method('DELETE')
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-danger">Delete Picture</button>
                    </div>
                </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
