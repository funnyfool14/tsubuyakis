@if(Auth::id()!=$user->id)
    @if(Auth::user()->is_following($user->id))
        {!!Form::open(['route'=>['omoibito.unfollow',$user->id],'method'=>'delete'])!!}
            {!!Form::submit('興味なし',['class'=>"btn btn-danger btn-block"])!!}
        {!!Form::close()!!}
    @else
        {!!Form::open(['route'=>['omoibito.follow',$user->id]])!!}
            {!!Form::submit('興味あり',['class'=>"btn btn-primary btn-block"])!!}
        {!!Form::close()!!}
    @endif
@endif