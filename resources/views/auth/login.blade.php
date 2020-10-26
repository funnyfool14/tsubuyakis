@extends('commons.layouts')
@section('content')
<div class="text-center">
    <h1>login</h1>
</div>
<div class="row">
    <div class="col-sm-6 offset-sm-3">
        {!!Form::open(['route'=>'login.post'])!!}
            <div class="form-groupe">
                {!!Form::label('email','電子郵便宛先')!!}
                {!!Form::email('email',old('email'),['class'=>"form-control"])!!}
            </div>
            <div class="form-groupe">
                {!!Form::label('password','符号')!!}
                {!!Form::password('password',['class'=>"form-control"])!!}
            </div>
            <div class="mt-3">
            {!!Form::submit('接続',['class'=>'btn btn-primary btn-block'])!!}
            </div>
        {!!Form::close()!!}
        <p class="mt-2">初めての方はこちらで{!!link_to_route('signup.get','共に呟きましょう')!!}</p>
    </div>
</div>
@endsection(‘content’)