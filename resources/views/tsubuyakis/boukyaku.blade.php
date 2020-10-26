@if(Auth::id()==$tsubuyaki->user_id)
{!!Form::open(['route'=>['tsubuyakis.destroy',$tsubuyaki->id],'method'=>'delete'])!!}
    {!!Form::submit('忘却',['class'=>'btn btn-danger btn-sm'])!!}
{!!Form::close()!!}
@endif