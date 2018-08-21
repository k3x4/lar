<div class="form-group">
    <strong><?php echo e($field->options['label']); ?>:</strong>
    <?php echo Form::text(
        'fields[' . $field->id . ']',
        $field->value ?: $field->options['default'] ?: null,
        [
            'placeholder' => $field->options['placeholder'],
            'class' => 'form-control'
        ]
    ); ?>

</div>