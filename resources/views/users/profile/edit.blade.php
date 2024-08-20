@extends('layouts.app')

@section('title','Edit Profile')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <form action="{{route('profile.update')}}" enctype="multipart/form-data" method="post" class="bg-white shadow rounded-3 p-5">

                @csrf
                @method('PATCH')
                <h2 class="h3 mb-3 fw-light text-muted">Update Profile</h2>
                <div class="row mb-3">
                    <div class="col-4">
                        @if ($user->avatar)
                            <img src="{{$user->avatar}}" alt="" class="rounded-circle img-thumbnail d-block mx-auto avatar-lg">
                        @else
                            <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-lg"></i>
                        @endif
                    </div>
                    <div class="col-auto align-self-end">
                            <input type="file" name="avatar" id="" class="form-control form-control-sm mt-1">
                            <div class="form-text">
                                Acceptable formats: JPG, JPEG, PNG, GIF, SVG,
                                <br>
                                Max file size: 1048kb
                            </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="Enter name" value="{{$user->name}}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter email" value="{{$user->email}}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Introduction</label>
                   <textarea name="introduction" id="introduction" rows="3" class="form-control" placeholder="Enter introduction">{{$user->introduction}}</textarea>
                </div>
                <button type="submit" class="btn btn-outline-warning px-5">Save</button>

            </form>
        </div>
    </div>
@endsection
