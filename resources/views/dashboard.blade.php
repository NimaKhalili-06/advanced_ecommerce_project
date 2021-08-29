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
                        <a href="{{ route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="{{ url('/user/change/password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout </a>
                    </ul>
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Hi......</span>
                            <strong>{{ Auth::user()->name }}</strong> Welcome To S&N Online Shop
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
