<div class="form-group">
    <strong>{{ $field->options['label'] }}:</strong>
    {!! Form::text(
        'fields[' . $field->id . ']',
        $field->value ?: $field->options['default'] ?: null,
        [
            'placeholder' => $field->options['placeholder'],
            'class' => 'form-control'
        ]
    ) !!}
</div>