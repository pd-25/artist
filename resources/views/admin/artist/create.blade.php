@extends('admin.layout.main')
@section('title', env('APP_NAME') . ' | Artist-create')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="card">
                <div class="card-title">
                    <h4>Create Artist</h4>
                    @if (Session::has('msg'))
                        <p class="alert alert-info">{{ Session::get('msg') }}</p>
                    @endif
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('artists.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Artist Name</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" placeholder="full name" name="name"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Username</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" placeholder="username" name="username"
                                            value="{{ old('username') }}">
                                        @error('username')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" placeholder="email address"
                                            name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" class="form-control" placeholder="phone number" name="phone"
                                            value="{{ old('phone') }}">
                                        @error('name')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" placeholder="address" name="address"
                                    value="{{ old('address') }}">
                                @error('address')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label><span class="text-danger">*</span>
                                        <input type="password" class="form-control" placeholder="password" name="password"
                                            value="{{ old('password') }}">
                                        @error('password')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Zipcode</label><span class="text-danger">*</span>
                                        <input type="number" class="form-control" placeholder="zipcode" name="zipcode"
                                            value="{{ old('zipcode') }}">
                                        @error('zipcode')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Profile Image</label>
                                        <input type="file" class="form-control" name="profile_image"
                                            value="{{ old('profile_image') }}">
                                        @error('profile_image')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Banner Image</label>
                                        <input type="file" class="form-control" name="banner_image"
                                            value="{{ old('banner_image') }}">
                                        @error('banner_image')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                
                                    <div class="col-md-2">
                                        <label>Sunday Time</label>
                                    </div>

                                    <div class="col-md-2">
                                        <input type="time" name="sunday_from" class="form-control">
                                    </div>

                                    <div class="col-md-2">
                                        <input type="time" name="sunday_to" class="form-control">
                                        
                                    </div>



                                    <div class="col-md-2">
                                        <label>Monday Time</label>
                                    </div>

                                    <div class="col-md-2">
                                        <input type="time" name="monday_from" class="form-control">
                                    </div>

                                    <div class="col-md-2">
                                        <input type="time" name="monday_to" class="form-control">
                                        
                                    </div>

                                    <div class="col-md-2">
                                        <label>Tuesday Time</label>
                                    </div>

                                    <div class="col-md-2">
                                        <input type="time" name="tuesday_from" class="form-control">
                                    </div>

                                    <div class="col-md-2">
                                        <input type="time" name="tuesday_to" class="form-control">
                                        
                                    </div>

                                    <div class="col-md-2">
                                        <label>Wednesday Time</label>
                                    </div>

                                    <div class="col-md-2">
                                        <input type="time" name="wednesday_from" class="form-control">
                                    </div>

                                    <div class="col-md-2">
                                        <input type="time" name="wednesday_to" class="form-control">
                                        
                                    </div>

                                    <div class="col-md-2">
                                        <label>Thrusday Time</label>
                                    </div>

                                    <div class="col-md-2">
                                        <input type="time" name="thrusday_from" class="form-control">
                                    </div>

                                    <div class="col-md-2">
                                        <input type="time" name="thrusday_to" class="form-control">
                                        
                                    </div>

                                    <div class="col-md-2">
                                        <label>Friday Time</label>
                                    </div>

                                    <div class="col-md-2">
                                        <input type="time" name="friday_from" class="form-control">
                                    </div>

                                    <div class="col-md-2">
                                        <input type="time" name="friday_to" class="form-control">
                                        
                                    </div>

                                    <div class="col-md-2">
                                        <label>Saterday Time</label>
                                    </div>

                                    <div class="col-md-2">
                                        <input type="time" name="saterday_from" class="form-control">
                                    </div>

                                    <div class="col-md-2">
                                        <input type="time" name="saterday_to" class="form-control">
                                        
                                    </div>
                                
                            </div>






                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
