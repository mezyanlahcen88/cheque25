<div class="form-check form-switch d-flex justify-content-center">
    <input class="form-check-input default"
        data-route-name="{{ route('language.changestatus') }}" type="checkbox"
        role="switch" data-id="{{ $object->id }}"
        {{ $object->isDefault ? 'checked' : '' }}>
</div>
