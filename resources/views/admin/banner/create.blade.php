@extends('admin.layout.main')
@section('title', env('APP_NAME') . ' | BannerImage-create')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="card">
                <div class="card-title">
                    <h4>Create Banner Image</h4>
                    @if (Session::has('msg'))
                        <p class="alert alert-info">{{ Session::get('msg') }}</p>
                    @endif
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        @if (Auth::guard('artists')->check())
                            <form action="{{ route('artists.uploadArtistWiseBanner') }}" method="POST" enctype="multipart/form-data">
                            @else
                                <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
                        @endif
                        @csrf

                        <div class="form-group">
                            <label>Artist Name</label><span class="text-danger">*</span>
                            @if (Auth::guard('artists')->check())
                                <select name="user_id" class="form-control" value="{{ old('user_id') }}">
                                    <option selected value="{{ auth()->guard('artists')->id() }}">
                                        {{ auth()->guard('artists')->user()->name }}</option>
                                </select>
                            @else
                                <select name="user_id" class="form-control" value="{{ old('user_id') }}">
                                    <option value="">select artists</option>
                                    @foreach ($artists as $artist)
                                        <option value="{{ $artist->id }}">{{ $artist->username }}</option>
                                    @endforeach
                                </select>
                            @endif


                            @error('user_id')
                                <span class="text-danger" role="alert">
                                    <strong>{{ 'Artist name field is required' }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>Attach the banner image here</label><span class="text-danger">*</span>
                            <input type="file" class="form-control" name="banner_image"
                                value="{{ old('banner_image') }}">
                            @error('image')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
