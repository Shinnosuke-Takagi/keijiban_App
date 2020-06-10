@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form class="card card-sm" action="{{ route('search') }}" method="post">
            @csrf
            <div class="card-body row no-gutters align-items-center">
              <div class="col-auto">
                <i class="fas fa-search h4 text-body"></i>
              </div>
                <!--end of col-->
                <div class="col">
                  <input class="form-control form-control-lg form-control-borderless" type="search" name="search" value="@isset($search_result) {{$search_result}} @endisset" placeholder="キーワードを入れてください">
                </div>
                <!--end of col-->
                <div class="col-auto">
                  <button class="btn btn-lg btn-info text-white" type="submit">検索</button>
                </div>
                <!--end of col-->
            </div>
          </form>
          @if(isset($search_result))
            <div class="alert alert-light" role="alert">
              検索結果: {{count($posts)}}件
            </div>
          @endif

          <div class="card">
                <div class="card-header">投稿一覧</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($posts as $post)
                    <div class="card">
                      <h5 class="card-header">投稿{{$post->id}}
                        @if(Auth::id() === $post->user_id)
                        <form method="POST" action="{{ route('posts.destroy',['post' => $post]) }}">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm">
                            投稿を削除する
                          </button>
                        </form>
                        @endif
                      </h5>
                      <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item p-0">投稿者: {{$post->user->name}}</li>
                            <a href="{{ route('categories.index',['category' => $post->category_id]) }}">
                              カテゴリー: {{$post->category->content}}
                            </a>
                          <li class="list-group-item p-0">
                            <a href="{{ route('comments.index',['post' => $post]) }}">
                              コメント数: ({{$post->comments->count()}})
                            </a>
                          </li>
                        </ul>
                        <p class="card-text pt-1">{{$post->detail}}</p>
                      </div>
                    </div>
                      @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
