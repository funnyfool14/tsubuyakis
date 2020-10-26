@extends('commons.layouts')
@section('content')
    <div class="text-center">
        <h1>登録</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!!Form::open(['route'=>'signup.post'])!!}
                <div class="form-group">
                    {!!Form::label('name','御芳名')!!}
                    {!!Form::text('name',old('name'),['class'=>'form-control'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('email','電子郵便宛先')!!}
                    {!!Form::email('email',old('email'),['class'=>'form-control'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('password','符号')!!}
                    {!!Form::password('password',['class'=>'form-control'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('password','符号を確認下さい')!!}
                    {!!Form::password('password_confirmation',['class'=>'form-control'])!!}
                </div>
                {!!Form::submit('呟きたい',['class'=>'btn btn-primary btn-block'])!!}
            {!!Form::close()!!}
        </div>
    </div>
@endsection(‘content’)