@extends('frontend.index')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><br>
                    <img height="100%" width="100%"
                        src="{{ isset($user->profile_photo_path) ? asset($user->profile_photo_path) : asset('backend/images/150x100.png') }}"
                        class="card-img-top" style="border-radius: 50%" alt=""><br><br>
                    <ul class="list-group list-group-flush">
                        <a href="{{ url('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="{{ url('/user/change/password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout </a>
                    </ul>
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Change Password</span>
                            <strong></strong>
                        </h3>
                        <div class="card-body">
                            <form method="POST" action="{{route('user.password.update')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="current_password">Current Password </label>
                                    <input type="password" name="old_password" id="current_password"
                                        class="form-control" />
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @if (session('error'))
                                        <span class="text-danger">{{ session('error') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="password">New Password </label>
                                    <input type="password" name="password" class="form-control "
                                        id="password" />
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="password_confirmation">Confirm Password </label>
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" />
                                    @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group"><button type="submit" class="btn-danger btn">Update</button></div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
