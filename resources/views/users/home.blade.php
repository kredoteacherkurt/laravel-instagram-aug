@extends('layouts.app')

@section('title', 'Home')


@section('content')
    <div class="row">
        <div class="col-8">
            @forelse ($all_posts as $post)
                <div class="card mb-5">
                    {{-- title --}}
                        @include('users.post.contents.title')
                    {{-- body --}}
                    @include('users.post.contents.body')
                </div>
            @empty
                <div class="text-center">
                    <h2>Share Photos</h2>
                    <p class="text-secondary">When you share photos, they'll appear on your profile</p>
                    <a href="" class="text-decoration-none">Share your first photo</a>
                </div>
            @endforelse
        </div>
        <div class="col-4 bg-secondary">
            PROFILE OVERVIEW + SUGGESTIONS
        </div>
    </div>
@endsection
