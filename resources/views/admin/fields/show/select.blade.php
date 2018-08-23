@php $field->options = unserialize($field->options) @endphp
<div class="form-group">
    <strong>{{ $field->options['label'] }}:</strong>
    {!! Form::select(
        'fields[' . $field->id . ']',
        $field->options['values'],
        $field->value ?: $field->options['default'] ?: null,
        [
            'class' => 'form-control select2',
            'style' => 'width: 30%;'
        ]
    ) !!}
</div>