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
                        <a href="{{  }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout </a>
                    </ul>
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Hi......</span>
                            <strong>{{ Auth::user()->name }}</strong> Update Your Profile
                        </h3>
                        <div class="card-body">
                            <form method="POST" action="{{route('user.profile.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="name">Name <span>*</span></label>
                                    <input type="text" value="{{ $user->name }}" name="name" id="name"
                                        class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="email">Email Address <span>*</span></label>
                                    <input type="email" value="{{ $user->email }}" name="email" class="form-control "
                                        id="email" />
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="phone">Phone <span>*</span></label>
                                    <input type="text" name="phone" class="form-control" id="phone" />
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="profile_photo_path">User Image <span>*</span></label>
                                    <input type="file" name="profile_photo_path" class="form-control"
                                        id="profile_photo_path" />
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
