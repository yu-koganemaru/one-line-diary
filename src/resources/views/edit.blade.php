@extends('layouts.app')

@section('content')
      
  <form method="post" action="/post/{{$post->id}}" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <input type="text" name="main_text" value="{{ old('image') ?? $post->main_text }}">
    <input type="file" name="image">
    @error('image')
      <div class="error"><span>{{ $message }}</span></div>
    @enderror
    <img src="{{ asset($post->image->image_path ?? '') }}" alt="">

    <button>更新</button>

  </form>

  <form method="post" action="/post/{{$post->id}}" enctype="multipart/form-data">
    @method('delete')
    @csrf
    <button>削除</button>
  </form>

@endsection