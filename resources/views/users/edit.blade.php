@extends('layouts.app')

@section('content')
    <div class="container mt-4 mb-4">
        <h2> {{ $user->name }} さんのプロフィールを編集</h2>
        <div class="row">
            <aside class="col-md-3 mt-4">
                @if($user->user_image == null)
                    <img class="rounded-circle img-fluid icon-img" src="/images/no_image.png" alt="">
                @else
                    <img class="rounded-circle img-fluid icon-img" src="{{ $user->user_image }}" alt="">
                @endif
                <h6 class="mt-4">現在のプロフィール画像</h4>
            </aside>
            <aside class="col-sm-9 mt-4">
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
                
                    {!! Form::submit('プロフィールを更新', ['class' => 'btn btn-dark btn-block mb-4']) !!}
                {!! Form::close() !!}
                
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                    退会する
                </button>
            </aside>
        </div>
    </div>
    
    {{-- モーダルここから --}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">本当に退会しますか？</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    {!! Form::model($user, ['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                        {!! Form::submit('退会する', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>
    {{-- モーダルここまで --}}
@endsection