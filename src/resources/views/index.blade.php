@extends('layouts.app')

@section('content')
      
  <h1>ONE LINE DIARY</h1>
  
  @forelse ($posts as $post)
    <li>{{ $post->main_text }}</li>
  @empty
      <p>投稿はありません。</p>
  @endforelse

@endsection