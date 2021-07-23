<ul class="nav nav-tabs nav-justified mt-3">
  <li class="nav-item">
    <a class="nav-link text-muted {{ $hasArticles ? 'active' : '' }}"
       href="{{ route('users.show', ['name' => $user->name]) }}">
      質問
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-muted {{ $hasLikes ? 'active' : '' }}"
       href="{{ route('users.comments', ['name' => $user->name]) }}">
      回答
    </a>
  </li>
</ul>
