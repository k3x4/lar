@php extract($config) @endphp

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $title }}</h3>
    </div>
    <div class="box-body">
        <div class="form-group">
            <button type="submit" class="btn btn-success" name="status" value="publish">Submit</button>
            @if ($draft)
                <button type="submit" class="btn btn-default" name="status" value="draft">Save draft</button>
            @endif
        </div>
    </div>
</div>