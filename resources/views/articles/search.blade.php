{!! Form::open(['method'=>'get', 'route' => ['search']]) !!}

<div class="card">
    <div class="card-body">
        <div class="row">
          <div class="form-group col-sm-6">
            {!! Form::label('queryText', 'Title') !!}
            {!! Form::text('queryText', '', ['class' => 'form-control', 'placeholder' => 'キーワードを入力']) !!}
          </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
