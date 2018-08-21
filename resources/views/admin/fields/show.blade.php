@foreach($fields as $field)
    @include('admin.fields.show.' . $field->type)
@endforeach