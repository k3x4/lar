@php extract($config) @endphp

@section('head')
@parent
    <script src="{{ asset('js/lib/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('js/lib/bootstrap-select/css/bootstrap-select.min.css') }}">
@endsection

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $title }}</h3>
    </div>
    <div class="box-body">
        <div class="form-group">
            {!! Form::select('category_id', $categories, null, [
                'id' => 'category-select',
                'class' => 'selectpicker',
                'data-width' => 'fit'
            ]) !!}
        </div>
    </div>
</div>

@section('footer_scripts')
@parent
    <script>
        $( document ).ready(function() {
            $('.selectpicker').selectpicker('toggle');
        });
    </script>
@endsection