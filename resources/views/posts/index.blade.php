@extends('layouts.login')

@section('content')
<div class="container">
{!! Form::open(['url' => '/post/create']) !!}
<div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容内容を入力してください。']) !!}
        </div>
<button type="submit" class="btn btn-success pull-right"><img src="./images/post.png" alt="送信" /></button>
{!! Form::close() !!}
</div>
@foreach ($posts as $post)
                <td>{{ $post->id }}</td>
                <td>{{ $post->post }}</td>
                <td>{{ $post->created_at }}</td>
                <td><a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="./images/edit.png" alt="編集" /></a></td>
                <td><a class="btn btn-danger" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="./images/trash.png" alt="削除" /></a></td>
            </tr>
            @endforeach
            <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="/update" method="post">
                <textarea name="upPost" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
                <input type="submit" value="更新">
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>

@endsection
