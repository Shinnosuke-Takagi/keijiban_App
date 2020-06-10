@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">コメントする</div>

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
                    <form method="post" action="{{ route('comments.store',['post' => $post->id]) }}">
                      @csrf
                      <div class="form-group">
                        <label for="textarea">コメント内容</label>
                        <textarea class="form-control" id="textarea" name="description" rows="3" placeholder="コメントの本文になります"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">コメントする</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
