<div class="card mt-3">
  <div class="card-body d-flex flex-row">
    <div>
        <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
          <i class="fas fa-user-circle fa-3x"></i>
        </a>
      <h2 class="h5 card-title m-0">
        <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
          {{ $user->name }}
        </a>
      </h2>
      <div>{{ $user->introduction }}</div>
    </div>

    @if( Auth::id() === $user->id )
      <!-- dropdown -->
      <div class="ml-auto card-text">
        <div class="dropdown">
          <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <button type="button" class="btn btn-link text-muted m-0 p-2">
              <i class="fas fa-ellipsis-v"></i>
            </button>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('users.edit', ['name' => $user->name]) }}">
              <i class="fas fa-pen mr-1"></i>プロフィールを更新する
            </a>
          </div>
        </div>
      </div>
      <!-- dropdown -->
    @endif
  </div>
</div>

