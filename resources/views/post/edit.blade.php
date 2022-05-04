@extends('layouts.app')

@section('content')

    <form action="{{ route('post.update', $post->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}"
                   placeholder="title">
            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="post_content" id="content"
                      placeholder="content">{{ $post->post_content }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="text" name="image" class="form-control" id="image" value="{{ $post->image }}"
                   placeholder="image">
        </div>

        <div class="form-group">
            <label for="image category">category</label>
            <select class="form-select" id="category" name="category_id" aria-label="select category">
                @foreach($categories as $category)
                    <option
                            @if($post->category_id === $category->id )
                                {{ 'selected' }}
                            @endif
                            value="{{ $category->id }}"
                    >
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image category">tags</label>
            <select multiple class="form-select" id="tags" name="tags[]" aria-label="select tags">
                @foreach($tags as $tag)
                    <option
                            @foreach($post->tags as $postTag)
                                {{ $tag->id === $postTag->id ? 'selected' : '' }}
                            @endforeach
                            value="{{ $tag->id }}"
                    >
                        {{ $tag->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">update</button>
    </form>

@endsection