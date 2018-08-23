<?php $field->options = unserialize($field->options) ?>
<div class="form-group">
    <strong><?php echo e($field->options['label']); ?>:</strong>
    <?php echo Form::select(
        'fields[' . $field->id . ']',
        $field->options['values'],
        $field->value ?: $field->options['default'] ?: null,
        [
            'class' => 'form-control select2',
            'style' => 'width: 30%;'
        ]
    ); ?>

</div>