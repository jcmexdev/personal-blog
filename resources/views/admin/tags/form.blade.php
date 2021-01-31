<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Write tag name']) !!}
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <div class="hidden bg-gray-600 bg-yellow-600 bg-green-600 bg-blue-600 bg-indigo-600 bg-purple-600 bg-pink-600">
    </div>
    {!! Form::label('color', 'Tag color') !!}
    {!! Form::select(
    'color',
    [
    'bg-gray-600' => 'bg-gray-600',
    'bg-red-600' => 'bg-red-600',
    'bg-yellow-600' => 'bg-yellow-600',
    'bg-green-600' => 'bg-green-600',
    'bg-blue-600' => 'bg-blue-600',
    'bg-indigo-600' => 'bg-indigo-600',
    'bg-purple-600' => 'bg-purple-600',
    'bg-pink-600' => 'bg-pink-600',
    ],
    null,
    ['class' => 'form-control', 'placeholder' => 'Pick a color...'],
    ) !!}
    @error('color')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
