@extends('layouts.app')

@section('content')
    <div class="background_before_login description">
        <div class="text-center mb-4">
            <h1>ログイン</h1>
        </div>
    
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
    
                {!! Form::open(['route' => 'login.post']) !!}
                    <div class="form-group">
                        {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'メールアドレス']) !!}
                    </div>
    
                    <div class="form-group">
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'パスワード']) !!}
                    </div>
    
                    {!! Form::submit('ログイン', ['class' => 'btn btn-dark btn-block']) !!}
                {!! Form::close() !!}
    
                <p class="mt-2">アカウントをお持ちでない方はこちらから {!! link_to_route('signup.get', '新規登録') !!}</p>
            </div>
        </div>
    </div>
@endsection