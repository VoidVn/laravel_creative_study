@extends('layouts.app')

@section('content')

    <div class="row">
        <a class="btn btn-primary" href="{{ route('post.create') }}">post create</a>
    </div>
    @forelse ($posts as $post)
        <div class="row">
            {{ $post->id }}.
            <a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
            {{--<img width="150px" height="150px" src="{{ $post->image }}" alt="">--}}
            <br>
            <p>{{ $post->post_content }}</p>
            <hr>
        </div>
    @empty
        <p>No posts</p>
    @endforelse

    <div>
        {{ $posts->withQueryString()->links() }}
    </div>

@endsection