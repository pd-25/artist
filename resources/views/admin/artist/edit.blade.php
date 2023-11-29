@extends('admin.layout.main')
@section('title', env('APP_NAME') . ' | Category-edit')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="card">
                <div class="card-title">
                    <h4>Edit Artist</h4>
                    @if (Session::has('msg'))
                        <p class="alert alert-info">{{ Session::get('msg') }}</p>
                    @endif
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('artists.update', encrypt($artist->id)) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Artist Name</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" placeholder="full name" name="name"
                                            value="{{ $artist->name }}">
                                        @error('name')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Username</label><span class="text-info">(This field is not changable)</span>
                                        <span class="form-control">{{ $artist->username }}</span>
                                        @error('username')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label><span class="text-info">(This field is not changable)</span>
                                        <span class="form-control">{{ $artist->email }}</span>
                                        @error('email')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" class="form-control" placeholder="phone number" name="phone"
                                            value="{{ $artist->phone }}">
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
                                    value="{{ $artist->address }}">
                                @error('address')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Change Password</label><span class="text-info">(if you don't want to change,
                                            don't keep it blank)</span>
                                        <input type="password" class="form-control" placeholder="password" name="password">
                                        @error('password')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label>Profile Image</label>
                                        <input type="file" class="form-control" name="profile_image">
                                        @error('profile_image')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Zipcode</label><span class="text-danger">*</span>
                                        <input type="number" class="form-control" placeholder="zipcode" name="zipcode"
                                            value="{{ $artist->zipcode }}">
                                        @error('zipcode')
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

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Current Profile Image</label>
                                        @if (!empty($artist->profile_image) && File::exists(public_path('storage/ProfileImage/' . $artist->profile_image)))
                                            <img style="height: 82px; width: 82px;"
                                                src="{{ asset('storage/ProfileImage/' . $artist->profile_image) }}"
                                                alt="">
                                        @else
                                            <img style="height: 82px; width: 82px;" src="{{ asset('noimg.png') }}"
                                                alt="">
                                        @endif
                                    </div>

                                    <div class="form-group">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Current Banner Image</label>
                                        @if (!empty($artist->banner_image) && File::exists(public_path('storage/BannerImage/' . $artist->banner_image)))
                                            <img style="height: 82px; width: 82px;"
                                                src="{{ asset('storage/BannerImage/' . $artist->banner_image) }}"
                                                alt="">
                                        @else
                                            <img style="height: 82px; width: 82px;" src="{{ asset('noimg.png') }}"
                                                alt="">
                                        @endif
                                    </div>
                                    <div class="form-group">

                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                
                                <div class="col-md-1">
                                    <label>Sunday Time</label>
                                </div>

                                <div class="col-md-2">
                                    <input type="time" name="sunday_from" value="{{ date('H:i', strtotime(@$artist->timeData->sunday_from)) }}" class="form-control">
                                </div>

                                <div class="col-md-2">
                                    <input type="time" name="sunday_to" value="{{ date('H:i', strtotime(@$artist->timeData->sunday_to)) }}" class="form-control">
                                    
                                </div>
                                <div class="col-md-1">
                                    <input type="checkbox" name="sunday_close" id="check1">
                                    <label class="form-check-label">Close</label>
                                    
                                </div>



                                <div class="col-md-1">
                                    <label>Monday Time</label>
                                </div>

                                <div class="col-md-2">
                                    <input type="time" name="monday_from" value="{{ date('H:i', strtotime(@$artist->timeData->monday_from ))}}" class="form-control">
                                </div>

                                <div class="col-md-2">
                                    <input type="time" name="monday_to" value="{{ date('H:i', strtotime(@$artist->timeData->monday_to)) }}" class="form-control">
                                    
                                </div>
                                <div class="col-md-1">
                                    <input type="checkbox" name="monday_close" id="check2">
                                    <label class="form-check-label">Close</label>
                                    
                                </div>

                                <div class="col-md-1">
                                    <label>Tuesday Time</label>
                                </div>

                                <div class="col-md-2">
                                    <input type="time" name="tuesday_from" value="{{ date('H:i', strtotime(@$artist->timeData->tuesday_from)) }}" class="form-control">
                                </div>

                                <div class="col-md-2">
                                    <input type="time" name="tuesday_to" value="{{ date('H:i', strtotime(@$artist->timeData->tuesday_to)) }}" class="form-control">
                                    
                                </div>
                                <div class="col-md-1">
                                    <input type="checkbox" name="tuesday_close" id="check3">
                                    <label class="form-check-label">Close</label>
                                    
                                </div>
                                <div class="col-md-1">
                                    <label>Wednesday Time</label>
                                </div>

                                <div class="col-md-2">
                                    <input type="time" name="wednesday_from" value="{{ date('H:i', strtotime(@$artist->timeData->wednesday_from)) }}" class="form-control">
                                </div>

                                <div class="col-md-2">
                                    <input type="time" name="wednesday_to" value="{{ date('H:i', strtotime(@$artist->timeData->wednesday_to)) }}" class="form-control">
                                    
                                </div>
                                <div class="col-md-1">
                                    <input type="checkbox" name="wednesday_close" id="check5">
                                    <label class="form-check-label">Close</label>
                                    
                                </div>

                                <div class="col-md-1">
                                    <label>Thrusday Time</label>
                                </div>

                                <div class="col-md-2">
                                    <input type="time" name="thrusday_from" value="{{ date('H:i', strtotime(@$artist->timeData->thrusday_from)) }}" class="form-control">
                                </div>

                                <div class="col-md-2">
                                    <input type="time" name="thrusday_to" value="{{ date('H:i', strtotime(@$artist->timeData->thrusday_to)) }}" class="form-control">
                                    
                                </div>
                                <div class="col-md-1">
                                    <input type="checkbox" name="thrusday_close" id="check6">
                                    <label class="form-check-label">Close</label>
                                    
                                </div>

                                <div class="col-md-1">
                                    <label>Friday Time</label>
                                </div>

                                <div class="col-md-2">
                                    <input type="time" name="friday_from" value="{{ date('H:i', strtotime(@$artist->timeData->friday_from)) }}" class="form-control">
                                </div>

                                <div class="col-md-2">
                                    <input type="time" name="friday_to" value="{{ date('H:i', strtotime(@$artist->timeData->friday_to)) }}" class="form-control">
                                    
                                </div>
                                <div class="col-md-1">
                                    <input type="checkbox" name="friday_close" id="check7">
                                    <label class="form-check-label">Close</label>
                                    
                                </div>

                                <div class="col-md-1">
                                    <label>Saterday Time</label>
                                </div>

                                <div class="col-md-2">
                                    <input type="time" name="saterday_from" value="{{ date('H:i', strtotime(@$artist->timeData->saterday_from)) }}" class="form-control">
                                </div>

                                <div class="col-md-2">
                                    <input type="time" name="saterday_to" value="{{ date('H:i', strtotime(@$artist->timeData->saterday_to)) }}" class="form-control">
                                    
                                </div>
                                <div class="col-md-1">
                                    <input type="checkbox" name="saterday_close" id="check8">
                                    <label class="form-check-label">Close</label>
                                    
                                </div>
                            
                        </div>






                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
