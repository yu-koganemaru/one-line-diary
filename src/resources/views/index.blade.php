@extends('layouts.app')

@section('content')
  <div class='top'>    
    <!-- 投稿の表示 -->
    @forelse ($posts as $post)
      <!-- 投稿への遷移 -->
      <li>{{ $post->main_text }}</li>
      <!-- 画像 -->
      <!-- 削除 -->
    @empty
        <p>投稿はありません。</p>
    @endforelse
    
    <!-- ページネーション -->
    {{ $posts->links() }}

    <!-- 投稿への遷移 -->
    <a class='post-link' href="{{url('post')}}">投稿する</a>

  </div>
@endsection