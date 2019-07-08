@extends('layouts.app')

@section('content')
    <div class="container mt-4 mb-4">
        <h2> {{ $user->name }} さんのプロフィールを編集</h2>
        <div class="row">
            <aside class="col-sm-4 mt-4">
                @if($user->user_image == null)
                    <img class="rounded-circle img-fluid" src="/storage/no_image.png" alt="">
                @else
                    <img class="rounded-circle img-fluid" src="/storage/{{$user->user_image}}" alt="">
                @endif
                <h6 class="mt-4 mx-auto" style="width: 130px;">プロフィール画像</h4>
            </aside>
            <aside class="col-sm-7 offset-1 mt-4">
                {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put', 'files' => true]) !!}
            
                    <div class="form-group">
                        {!! Form::label('user_image', 'プロフィール画像を変更: ') !!}
                        </br>
                        {!! Form::file('user_image', ['class' => 'control-label']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', 'ユーザー名を変更:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'メールアドレスを変更:') !!}
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('profile', 'プロフィール文を編集:') !!}
                        {!! Form::textarea('profile', null, ['class' => 'form-control']) !!}
                    </div>
                
                    {!! Form::submit('プロフィールを更新', ['class' => 'btn btn-dark btn-block']) !!}
                
                {!! Form::close() !!}
            </aside>
        </div>
    </div>
@endsection