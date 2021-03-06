<div class="card mt-3">
  <div class="card-body d-flex flex-row">
    <a href="{{ route('users.show',['name' => $comment->user->name]) }}" class="text-dark">
      <i class="fas fa-user-circle fa-3x mr-1"></i>
    </a>
    <div>
      <div class="font-weight-bold">
        <a href="{{ route('users.show', ['name' => $comment->user->name]) }}" class="text-dark">
          {{ $comment->user->name }}
        </a>
      </div>
      <div class="font-weight-lighter">{{ $comment->created_at->format('Y/m/d H:i') }}</div>
    </div>

  </div>
  <div class="card-body pt-0">
    <div class="card-text">
      {{ $comment->body }}
    </div>
    @if($comment->image)
      <img class='w-100 mb-3' src="{{ $comment->image }}"/>
    @else
      <p></p>
    @endif
  </div>

</div>


