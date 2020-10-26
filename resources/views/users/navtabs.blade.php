<ul class="nav nav-tabs nav-justified mb-3">
    <li class="nav-item">
        <a href="{{route('users.show',['user'=>$user->id])}}"class="nav-link{{Request::routeIs('users.show')?'active':''}}">見、そして知る
            <span class="badge badge-secondary">{{$user->tsubuyakis_count}}</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('omoibito.followings',['id'=>$user->id])}}"class="nav-link{{Request::routeIs('omoibito.followings')?'active':''}}">思い人
            <span class="badge badge-secondary">{{$user->followings_count}}</span>
        </a>
    </li>    
    <li class="nav-item">
        <a href="{{route('omoibito.followers',['id'=>$user->id])}}"class="nav-link{{Request::routeIs('omoibito.followers')?'active':''}}">思われ人
            <span class="badge badge-secondary">{{$user->followers_count}}</span>
        </a>
    </li>
        <li class="nav-item">
        <a href="{{route('users.sasatteru',['id'=>$user->id])}}"class="nav-link{{Request::routeIs('users.sasatteru')?'active':''}}">刺さった
            <span class="badge badge-secondary">{{$user->sasatteru_count}}</span>
        </a>
    </li>
</ul>