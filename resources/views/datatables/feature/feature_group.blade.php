@if($feature_group)
    {{ $feature_group['title'] }}
@else    
    <span style="color:red;">Without group</span>
@endif