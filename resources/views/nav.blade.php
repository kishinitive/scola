<nav class="navbar navbar-expand navbar-dark bg-dark">

  <a class="navbar-brand" href="/"><i class="far mr-1"></i>Scola</a>

  <ul class="navbar-nav ml-auto d-flex align-items-center">

    {!! Form::open(['method'=>'get', 'route' => ['articles.index']]) !!}
      <div class="input-group">
        {!! Form::text('queryText', '', ['class' => 'form-control', 'placeholder' => 'キーワードを入力']) !!}
        {!! Form::button('<i class="fas fa-search input-group-btn"></i>' ,['class' => 'ml-0 btn-primary', 'type' => 'submit']) !!}
      </div>
    {!! Form::close() !!}

    @auth
    <li class="nav-item">
      <a class="nav-link" href="{{ route('articles.create') }}"><button type="button" class="btn btn-primary m-0"><i class="fas fa-pen mr-1"></i>質問する</button></a>
    </li>
    @endauth

    @guest
    <li class="nav-item ">
      <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
    </li>
    @endguest

    @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">ログイン</a>
    </li>
    @endguest

    @auth
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <button class="dropdown-item" type="button"
            onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'">
          マイページ
        </button>
        <div class="dropdown-divider"></div>
        <button form="logout-button" class="dropdown-item" type="submit">
          ログアウト
        </button>
      </div>
    </li>
    <form id="logout-button" method="POST" action="{{ route('logout') }}">
    @csrf
    </form>
    <!-- Dropdown -->
    @endauth

  </ul>

</nav>
