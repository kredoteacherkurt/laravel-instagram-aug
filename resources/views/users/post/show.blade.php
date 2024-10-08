@extends('layouts.app')

@section('title', 'Show post')


@section('content')
    <style>
        .col-4
        {
            overflow-y: scroll;
        }
        .card-body
        {
            position: absolute;
            top: 65px;
        }
    </style>
    <div class="row border shadow">
        <div class="col p-0 border-end">
            <img src="{{ $post->image }}" alt="post id {{ $post->id }}" class="w-100">
        </div>
        <div class="col-4 px-0 bg-white">
            <div class="card border-0">
                <div class="card-header bg-white py-3">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <a href="">
                                @if ($post->user->avatar)
                                    <img src="{{ $post->user->avatar }}" alt="{{ $post->user->name }}"
                                        class="rounded-circle avatar-sm">
                                @else
                                    <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                                @endif
                            </a>
                        </div>
                        <div class="col ps-0">
                            <a href="" class="text-decoration-none text-dark">
                                {{ $post->user->name }}
                            </a>
                        </div>
                        <div class="col-auto">
                            <div class="dropdown">
                                <button class="btn btn-sm shadow-none" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>

                                @if (Auth::user()->id === $post->user->id)
                                    <div class="dropdown-menu">
                                        <a href="{{route('post.edit',$post)}}" class="dropdown-item">
                                            <i class="fa-regular fa-pen-to-square"></i> Edit
                                        </a>

                                        <button class="dropdown-item text-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-post-{{ $post->id }}">
                                            <i class="fa-regular fa-trash-can"></i> Delete
                                        </button>
                                    </div>
                                    @include('users.post.contents.modals.delete')
                                @else
                                    <div class="dropdown-menu">
                                        <form action="" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="dropdown-item text-danger">
                                                Unfollow
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body w-100">
                    <div class="row align-items-center">
                        <div class="col-auto">

                            <form action="" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm p-0">
                                    <i class="fa-solid fa-heart text-danger"></i>
                                </button>
                            </form>

                        </div>
                        <div class="col-auto px-0">
                            <span>3</span>
                        </div>
                        <div class="col text-end">

                            @forelse ($post->category_posts as $category_post)
                                <div class="badge bg-dark bg-opacity-50">
                                    {{ $category_post->category->name }}
                                </div>
                            @empty
                                Uncategorized
                            @endforelse


                        </div>
                    </div>

                    <a href="" class="text-decoration-none text-dark fw-bold">
                        {{ $post->user->name }}
                    </a>
                    &nbsp;
                    <p class="d-inline fw-light">{{ $post->description }}</p>
                    <p class="text-muted small">
                       {{$post->created_at->diffForHumans() }}
                    </p>

                    <div class="mt-3">
                        {{-- All comments here --}}
                        @if ($post->comments->isNotEmpty())
                            <ul class="list-group mt-2">
                                @foreach ($post->comments as $comment)
                                    <li class="list-group-item border-0 p-0 mb-2">
                                        <a href="#" class="text-decoration-none text-dark fw-bold">{{ $comment->user->name }}</a>
                                        &nbsp;
                                        <p class="d-inline fw-light">{{ $comment->body }}</p>

                                        <form action="#" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <span class="text-uppercase text-muted xsmall">
                                                {{ date('M d, Y', strtotime($comment->created_at)) }}
                                            </span>

                                            {{-- If the auth user is THE OWNER OF THE COMMENT, show a delete button --}}
                                            @if (Auth::user()->id === $comment->user->id) 
                                                &middot;
                                                <button class="border-0 bg-transparent text-danger p-0 xsmall">Delete</button>
                                            @endif
                                            
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        <form action="{{ route('comment.store', $post->id) }}" method="post">
                            @csrf
                    
                            <div class="input-group">
                                <textarea name="comment_body{{ $post->id }}" rows="1" class="form-control form-control-sm"
                                    placeholder="Add a comment...">{{ old('comment_body'.$post->id) }}</textarea>
                                <button class="btn btn-outline-secondary btn-sm">Post</button>
                            </div>
                            {{-- Error --}}
                            @error('comment_body' . $post->id)
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </form>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
@endsection
