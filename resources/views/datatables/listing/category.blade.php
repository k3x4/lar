@if($category)
    {{ $category['title'] }}
@else    
    <span style="color:red;">Without category</span>
@endif