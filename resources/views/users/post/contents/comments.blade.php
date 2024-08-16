<div class="mt-3">
    {{-- Show all comments here --}}
    @if ($post->comments->isNotEmpty())
        <ul class="list-group mt-2">
            @foreach ($post->comments->take(3) as $comment)
                <li class="list-group-item border-0 p-0 mb-2">
                    <a href="#" class="text-decoration-none text-dark fw-bold">{{ $comment->user->name }}</a>
                    &nbsp;
                    <p class="d-inline fw-light">{{ $comment->body }}</p>

                    <form action="{{ route('comment.destroy', $comment) }}" method="post">
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
            @if ($post->comments->count() > 3)
                <li class="list-group-item border-0 p-0 mb-2">
                    <a href="{{route('post.show',$post)}}" class="text-decoration-none">View all {{ $post->comments->count() }} comments</a>
                </li>
            @endif
        </ul>
    @endif

    <form action="{{ route('comment.store') }}" method="post">
        @csrf

        <div class="input-group">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <textarea name="body" rows="1" class="form-control form-control-sm" placeholder="Add a comment...">{{ old('comment_body' . $post->id) }}</textarea>
            <button class="btn btn-secondary btn-sm">Post</button>
        </div>
        {{-- Error --}}
        @error('comment_body' . $post->id)
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </form>
</div>
