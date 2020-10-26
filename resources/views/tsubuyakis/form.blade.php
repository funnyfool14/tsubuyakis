{!!Form::open(['route'=>'tsubuyakis.store'])!!}
<div class="form-group">
    {!!Form::textarea('content',old('content'),['class'=>'form-control','rows'=>'2'])!!}
    <div class="mt-2">
        {!!Form::submit('呟き',['class'=>'btn btn-primary btn-block'])!!}
    </div>
</div>
{!!Form::close()!!}