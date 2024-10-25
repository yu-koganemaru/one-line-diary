@extends('layouts.app')

@section('content')
  <div class="post">
    <form method="POST" action="/post" enctype="multipart/form-data">
      @csrf

      <div>
        <input type="text" name="main_text" value="{{ old('main_text') }}">
      </div>
      <div>
        <input type="file" name="image"  value="{{ old('image') }}">
      </div>
      
      @error('image')
        <div class="error"><span>{{ $message }}</span></div>
      @enderror

      <button>アップロード</button>
    </form>
  </div>   
@endsection