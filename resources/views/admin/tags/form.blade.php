<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder' => 'Write tag name']) !!}
    @error('name')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('color', 'Tag color') !!}
    {!! Form::select('color', ['gray' => 'gray', 'red'=>'red', 'orange'=>'orange', 'yellow'=>'yellow', 'green' =>
    'green', 'teal' => 'teal', 'blue' => 'blue', 'indigo' => 'indigo', 'purple' => 'purple', 'pink' => 'pink'], null,
    ['class' => 'form-control', 'placeholder' => 'Pick a color...'])
    !!}
    @error('color')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
