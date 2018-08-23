<?php $field->options = unserialize($field->options) ?>
<div class="form-group">
    <strong><?php echo e($field->options['label']); ?>:</strong>
    <?php echo Form::number(
        'fields[' . $field->id . ']',
        intval($field->value) ?: intval($field->options['default']) ?: null,
        [
            'placeholder' => $field->options['placeholder'],
            'class' => 'form-control',
            'style' => 'width: 30%;'
        ]
    ); ?>

</div>