@extends('layouts.app')

@section('content')

   <div>
       {{ $post->title }}
   </div>
   <div>
       {{ $post->post_content }}
   </div>

   <div>
       <a href="{{ route('post.edit', $post->id) }}">edit</a>
   </div>

   <div>
       <form action="{{ route('post.destroy', $post->id) }}" method="post">
           @csrf
           @method('delete')
           <button type="submit" class="btn btn-danger">delete</button>
       </form>
   </div>

@endsection
