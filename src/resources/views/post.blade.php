@extends('layouts.app')

@section('content')
      
  <form method="POST" action="/post" enctype="multipart/form-data">
    
    @csrf
    <input type="text" name="main_text">
    <input type="file" name="image">

    <button>アップロード</button>

  </form>

@endsection