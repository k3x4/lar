<div class="form-group">
    @foreach($features as $feature)
        <span class="feature-cat-item">
            {{ Form::checkbox(
                    'features[]',
                    $feature->id,
                    in_array($feature->id, $attachFeatures) ? true : false
                )
            }}
            {{ $feature->title }}
        </span>
    @endforeach
</div>