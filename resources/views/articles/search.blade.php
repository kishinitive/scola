{!! Form::open(['method'=>'get', 'route' => ['articles.index']]) !!}

<div class="card">
    <div class="card-body">
        <div class="row">
          <div class="form-group col-sm-6">
            {!! Form::label('queryText', 'キーワード検索') !!}
            {!! Form::text('queryText', '', ['class' => 'form-control', 'placeholder' => 'キーワードを入力']) !!}
          </div>
          <div class="form-group col-sm-2 mt-4 pt-2">
              {!! Form::submit('Search', ['class' => 'btn btn-primary btn-block']) !!}
          </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
