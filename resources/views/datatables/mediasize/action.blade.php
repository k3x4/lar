<div class="dtable-td-wrapper">
    @if (!in_array($id, [1, 2, 3, 4]))
        <input type="checkbox" name="action" class="select" value="{{ $id }}" />
    @endif
</div>