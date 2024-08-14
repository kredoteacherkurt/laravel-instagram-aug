@extends('layouts.app')

@section('title', 'Edit post')

@section('content')

    <form action="" enctype="multipart/form-data" method="post">
        @csrf
        <div class="mb-3">
            <label for="category" class="form-label d-block fw-bold">
                Category <span class="text-muted fw-normal">(Up to 3)</span>
            </label>
            @foreach ($all_categories as $category)
                @if (in_array($category->id, $selected_categories))
                    <div class="form-check form-check-inline">
                        <input type="checkbox" value="{{ $category->id }}" name="category[]" id="{{ $category->name }}"
                            class="form-check-input" checked>
                        <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>
                    </div>
                @else
                    <div class="form-check form-check-inline">
                        <input type="checkbox" value="{{ $category->id }}" name="category[]" id="{{ $category->name }}"
                            class="form-check-input">
                        <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>
                    </div>
                @endif
            @endforeach

        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-bold text-capitalize">description</label>
            <textarea name="description" id="description" rows="3" class="form-control" placeholder="Whats on your mind?">{{$post->description}}</textarea>
        </div>
        <div class="mb-3">
            <img src="{{$post->image}}" alt="" class="img-thumbnail d-block">
            <label for="image" class="form-label fw-bold text-capitalize">image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-outline-primary px-5">Post</button>
    </form>
@endsection
