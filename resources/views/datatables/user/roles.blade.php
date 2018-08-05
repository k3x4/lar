<div class="dtable-td-wrapper" style="text-align:left;">
    @if(!empty($user_roles))
        @foreach($user_roles as $role)
            <label class="label label-success {{ 'label-' . $role->name }}">
                {{ $role->display_name }}
            </label>
        @endforeach
    @endif
</div>