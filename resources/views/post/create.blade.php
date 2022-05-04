@extends('layouts.app')

@section('content')

    <form action="{{ route('post.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" value="{{ old('title') }}" name="title" class="form-control" id="title" placeholder="title">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="post_content" id="content" placeholder="content">{{ old('post_content') }}</textarea>
            @error('post_content')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="text" name="image" class="form-control" id="image" placeholder="image">
        </div>
        <div class="form-group">
            <label for="category_id">category</label>
            <select class="form-select" id="category_id" name="category_id" aria-label="select category">
                @foreach($categories as $category)
                    <option
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                            value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tags">tags</label>
            <select multiple name="tags[]" id="tags" class="form-select">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
