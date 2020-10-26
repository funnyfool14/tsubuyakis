<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="/">独り言</a>
        {{--折りたたみボタン--}}
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse"id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
            {{--<ul class="nav navbaar-nav navbar-right">じゃなくていいのか確認--}}
                @if(Auth::check())
                {{--ユーザがログインしている時--}}
                <li class="nav-item">{!!link_to_route('users.index','呟き人',[],['class'=>'nav-link'])!!}</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{Auth::user()->naame}}</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item">{!!link_to_route('users.show','己を見る、そして知る',['user'=>Auth::id()])!!}</li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-item">{!!link_to_route('logout.get','去る')!!}</li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-item">{!!link_to_route('users.sasatteru','金言',['id'=>Auth::id()])!!}</li>
                        </ul>
                    </ul>
                </li>
                 {{--ユーザがログインしていない時--}}
                @else
                {{--登録リンク--}}
                {!!link_to_route('signup.get','呟きたい',[],['class'=>"nav-link"])!!}
                {{--接続リンク--}}
                {!!link_to_route('login','呟く',[],['class'=>"nav-link"])!!}
                @endif
            </ul>
        </div>
    </nav>
</header>