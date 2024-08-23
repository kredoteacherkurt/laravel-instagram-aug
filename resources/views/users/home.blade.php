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
        <div class="col-4">
                {{-- profile overview --}}
                <div class="row align-items-center mb-5 bg-white shadow-sm rounded-3 py-3">
                    <div class="col-auto">
                        <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}" class="rounded-circle avatar-md">
                    </div>
                    <div class="col ps-0">
                        <h4 class="">{{ Auth::user()->name }}</h4>
                        <p class=" mb-0">{{ auth()->user()->email }}</p>
                    </div>

                </div>

                @if ($suggested_users)
                {{-- suggested users --}}
                <div class="row">
                    <div class="col-auto">
                        <p class="fw-bold text-secondary">Suggestions for you</p>
                    </div>
                    <div class="col text-end">
                        <a href="#" class="fw-bold text-dark text-decoration-none">See all</a>
                    </div>

                </div>
                @foreach ($suggested_users as $user)
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <a href="{{route('profile.show',$user->id)}}">
                                @if ($user->avatar)
                                    <img src="{{$user->avatar}}" alt="" class="rounded-circle avatar-sm">
                                @else
                                    <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                                @endif
                            </a>
                        </div>
                        <div class="col ps-0 text-truncate">
                            <a href="{{route('profile.show',$user->id)}}" class="text-decoration-none text-dark fw-bold">
                                {{ $user->name }}
                            </a>

                        </div>
                        <div class="col-auto">
                            <form action="" method="post">
                                @csrf
                                <button type="submit" class="border-0 btn p-0 text-primary btn-sm">Follow</button>
                            </form>
                        </div>
                    </div>
                @endforeach
                @endif
        </div>
    </div>
@endsection
