@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">投稿</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                      <h5 class="card-header">投稿{{$post->id}}</h5>
                      <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item p-0">投稿者: {{$post->user->name}}</li>
                          <li class="list-group-item p-0">カテゴリー: {{$post->category->content}}</li>
                        </ul>
                        <p class="card-text pt-1">{{$post->detail}}</p>
                        @if(Auth::check())
                          <a href="{{ route('comments.create',['post' => $post])}}" class="btn btn-primary">コメントする</a>
                        @else
                          <a href="{{ route('register')}}" class="btn btn-primary">コメントする</a>
                        @endif
                      </div>
                    </div>
                    <div class="card">
                      <h5 class="card-header">コメント一覧</h5>
                      @foreach($comments as $comment)
                        <div class="card-body">
                          <p class="card-text pt-1">{{$comment->description}}<br/><span class="border-top ml-auto h7">投稿日: {{$comment->created_at}}</span></p>
                        </div>
                      @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
