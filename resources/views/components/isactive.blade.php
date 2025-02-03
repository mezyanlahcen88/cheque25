<div class="form-check form-switch d-flex justify-content-center">
    <input class="form-check-input changeStatus"
        {{-- data-route-name="{{ route($lowerName.'.changestatus') }}" type="checkbox" --}}
        data-route-name="{{ route($lowerName.'.changestatus') }}" type="checkbox"
        role="switch" data-id="{{ $object->id }}"
        {{ $object->isactive ? 'checked' : '' }}>
</div>
