@if(Auth::id()!=$tsubuyaki->user_id)
    @if(Auth::user()->is_sasatteru($tsubuyaki->id))
    {!!Form::open(['route'=>['sasatta.mouii',$tsubuyaki->id],'method'=>'delete'])!!}
        {!!Form::submit('もういい',['class'=>"btn btn-danger btn-block"])!!}
    {!!Form::close()!!}
    @else
    {!!Form::open(['route'=>['sasatta.sasatta',$tsubuyaki->id]])!!}
        {!!Form::submit('刺さった',['class'=>"btn btn-primary btn-block"])!!}
    {!!Form::close()!!}
    @endif
@endif