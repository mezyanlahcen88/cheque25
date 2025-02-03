<div class="d-flex justify-content-center gap-2">
    @can('user-edit')

    <div class="edit">
        <a href="{{ route('user.edit',['uuid' => $object->uuid, 'tab' => 'overview']) }}"
            title="Edit"><span class="badge  badge-primary"><i
                    class="las la-edit text-white"></i></span></a>
        </a>
    </div>
    @endcan
    @can('user-delete')
    <div class="remove">
        <a href="#" class="remove-item-btn" data-bs-toggle="modal"
            data-id="{{ $object->uuid }}"
            data-route-name="{{ route('user.destroy', 'delete') }}">
            <span class="badge  badge-danger"><i
                    class="las la-trash text-white"></i></span></a>
    </div>
    @endcan
</div>
