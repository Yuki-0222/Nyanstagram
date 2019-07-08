@extends('layouts.app')

@section('content')
    <div class="background_before_login description">
        <div class="text-center mb-4">
            <h1>新規登録</h1>
        </div>
    
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
    
                {!! Form::open(['route' => 'signup.post']) !!}
                    <div class="form-group">
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
                    </div>
    
                    <div class="form-group">
                        {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'メールアドレス']) !!}
                    </div>
    
                    <div class="form-group">
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'パスワード']) !!}
                    </div>
    
                    <div class="form-group">
                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'パスワード(確認用)']) !!}
                    </div>
    
                    {!! Form::submit('新規登録', ['class' => 'btn btn-dark btn-block']) !!}
                {!! Form::close() !!}
                
                <p class="mt-2">アカウントをお持ちの方はこちらから {!! link_to_route('login', 'ログイン') !!}</p>
            </div>
        </div>
    </div>
@endsection