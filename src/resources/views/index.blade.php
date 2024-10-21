@extends('layouts.app')

@section('content')
  <div class='top'>    
    <!-- 投稿の表示 -->
    @forelse ($posts as $post)
      <li>{{ $post->main_text }}</li>
    @empty
        <p>投稿はありません。</p>
    @endforelse
    
    <!-- ページネーション -->
    {{ $posts->links() }}

    <a class='post-link' href="{{url('post')}}">投稿する</a>

  </div>
@endsection