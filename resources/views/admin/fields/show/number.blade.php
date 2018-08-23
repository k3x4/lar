@php $field->options = unserialize($field->options) @endphp
<div class="form-group">
    <strong>{{ $field->options['label'] }}:</strong>
    {!! Form::number(
        'fields[' . $field->id . ']',
        intval($field->value) ?: intval($field->options['default']) ?: null,
        [
            'placeholder' => $field->options['placeholder'],
            'class' => 'form-control'
        ]
    ) !!}
</div>