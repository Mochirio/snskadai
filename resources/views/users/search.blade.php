@extends('layouts.login')

@section('content')
{!! Form::open(['method' => 'GET']) !!}
{!! Form::text('search', null,['placeholder' => 'ユーザー名']) !!}
{!! Form::submit('検索') !!}
{!! Form::close() !!}

@foreach($users as $user)
<tr>
    <td>{{{ $user->image }}}</td><td>{{{ $user->username }}}</td>
  </tr>
  @endforeach
@endsection
