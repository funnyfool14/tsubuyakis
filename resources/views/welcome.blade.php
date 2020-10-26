@extends('commons.layouts')
@section('content')
@if(Auth::check())
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card')
        </aside>
        <div class="col-sm-8">
            @include('tsubuyakis.form')
            @include('tsubuyakis.tsubuyakis')
        </div>
    </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>独り言は独りじゃない</h1>
                <p>ぼそぼそっ・・・・</p>
                {{--登録リンク--}}
                {!!link_to_route('signup.get','共に呟きましょう',[],['class'=>'btn btn-lg btn-primary'])!!} 
            </div>
        </div>
    @endif
@endsection('content')