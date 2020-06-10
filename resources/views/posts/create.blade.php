@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新規投稿</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($errors->any())
                      <div class="alert alert-danger" role="alert">
                        <ul>
                          @foreach($errors->all() as $error)
                            <li style="list-style-type: none;">{{$error}}</li>
                          @endforeach
                        </ul>
                      </div>
                    @endif
                    <form method="post" action="{{ route('posts.store') }}">
                      @csrf
                      <div class="form-group">
                        <label for="title">タイトル</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="投稿の題名です">
                      </div>
                      <div class="form-group">
                        <label for="category">カテゴリー</label>
                        <select class="form-control" id="category" name="content">
                          @foreach($categories as $category)
                            <option>{{$category->content}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="textarea">投稿内容</label>
                        <textarea class="form-control" id="textarea" name="detail" rows="3" placeholder="投稿の本文になります"></textarea>
                      </div>
                      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                      <button type="submit" class="btn btn-primary">投稿する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
