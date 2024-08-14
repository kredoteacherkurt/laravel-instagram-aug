<div class="container p-0">
    <a href="{{route('post.show',$post)}}">
        <img src="{{ $post->image }}" alt="{{ $post->id }}" class="w-100">
    </a>
</div>

<div class="card-body">
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
    <p class="text-uppercase text-muted xsmall">
        {{ date('M d, Y', strtotime($post->created_at)) }}
    </p>

</div>
