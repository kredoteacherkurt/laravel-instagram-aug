@extends('layouts.app')

@section('title', 'Create post')

@section('content')
    <form action="{{route('post.store')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="mb-3">
            <label for="category" class="form-label d-block fw-bold">
                Category <span class="text-muted fw-normal">(Up to 3)</span>
            </label>
            @foreach ($all_categories as $category)
                <div class="form-check form-check-inline">
                    <input type="checkbox" value="{{ $category->id }}" name="category[]" id="{{ $category->name }}"
                        class="form-check-input">
                    <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>
                </div>
            @endforeach

        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-bold text-capitalize">description</label>
            <textarea name="description" id="description" rows="3" class="form-control" placeholder="Whats on your mind?"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label fw-bold text-capitalize">image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-outline-primary px-5">Post</button>
    </form>
@endsection
