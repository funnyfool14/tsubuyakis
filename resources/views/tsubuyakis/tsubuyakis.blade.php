@if(count($tsubuyakis)>0)
    <ul class="list-unstyle"><ul class="list-unstyled">
        @foreach($tsubuyakis as $tsubuyaki)
            <li class="media mb-3">
                <img class="mr-2 rounded"src="{{Gravatar::get($user->email,['size'=>50])}}"alt="">
                <div class="media-body">
                    <div>
                        {{--userの記述をチェック--}}
                        {!!link_to_route('users.show',$tsubuyaki->user->name,['user'=>$tsubuyaki->user->id])!!}
                        {{--記述の意味--}}
                        <span class="text-muted">posted at{{$tsubuyaki->created_at}}</span>
                    </div>
                    <div>
                        <p class="mb-0">{!!nl2br(e($tsubuyaki->content))!!}</p>
                    </div>
                    <div>
                        @include('tsubuyakis.boukyaku')
                        @include('sasatta.button')
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
{{$tsubuyakis->links()}}
@endif