@extends('layouts.app')

@section('content')
      
  <form method="POST" action="/" enctype="multipart/form-data">

    @csrf
    <input type="text" name="main_text" value="{{ old('main_text') }}">
    <input type="file" name="image"  value="{{ old('image') }}">
    @error('image')
      <div class="error"><span>{{ $message }}</span></div>
    @enderror

    <button>アップロード</button>

  </form>

@endsection