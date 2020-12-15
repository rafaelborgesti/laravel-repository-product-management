<div class="form-group">
    {!! Form::text('name', null, ['placeholder'=>'Nome','class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::text('url', null, ['placeholder'=>'URL','class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::text('price', null, ['placeholder'=>'Price','class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::textarea('description', null, ['cols'=>'30', 'rows'=>'10', 'class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
</div>
