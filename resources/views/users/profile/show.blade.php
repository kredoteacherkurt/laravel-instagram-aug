@extends('layouts.app')

@section('title', 'Profile')


@section('content')

    @include('users.profile.header')

    <div style="margin-top: 100px">
        <div class="row">
            @forelse ($user->posts as $post)
                <div class="col-lg-4 col-md-6">
                    <a href="{{route('post.show',$post)}}">
                        <img src="{{ $post->image }}" alt="" class="img-thumbnail">
                    </a>
                </div>
            @empty
                <h2 class="text-center text-secondary">
                    No posts yet
                </h2>
            @endforelse
        </div>
    </div>



@endsection
