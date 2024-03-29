@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <h2>{{Auth::user()->name}}さんの猫写真を投稿！</h2>
        <div>
            {!! Form::open(['route' => ['photos.store'], 'files' => true]) !!}
                <div class="form-group">
                    {!! Form::label('image', 'ファイルを添付: ') !!}
                    </br>
                    {!! Form::file('image', ['class' => 'control-label']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', '説明:') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('猫写真を投稿', ['class' => 'btn btn-dark btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection