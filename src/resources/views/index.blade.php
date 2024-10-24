@extends('layouts.app')

@section('content')
  <div class='top'> 

    <ul>
      <!-- 投稿の表示 -->
      @forelse ($posts as $post)
      <li class='post'>
        <ul>      
          <!-- 投稿 -->
          <li>{{ $post->main_text }}</li>
          <li>{{ $post->created_at }}</li>

          <!-- 編集 -->
          <li><a class='post-link' href="{{url('/post/'.$post->id.'/edit')}}">編集</a></li>

          <!-- 画像 -->
          <li><img src="{{ asset($post->image->image_path ?? '') }}" alt=""></li>
        </ul>
      </li>
      @empty
        <li><p>投稿はありません。</p></li>
      @endforelse

    </ul>
    
    <!-- ページネーション -->
    {{ $posts->links() }}

    <!-- 投稿への遷移 -->
    <a class='post-link' href="{{url('post/create')}}">投稿する</a>
    
  </div>
@endsection