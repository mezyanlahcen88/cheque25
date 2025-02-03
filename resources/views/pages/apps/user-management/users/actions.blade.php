<div class="d-flex justify-content-center gap-2">
    {{-- @endcan --}}
    {{-- @can('{{lowerName}}-edit') --}}
    <div class="show">
        <a href="{{ route('admin.users.show', $object->uuid) }}"
            title="Show"><span class="badge  badge-info"><i
                    class="las la-eye text-white"></i></span></a>
        </a>
    </div>
    <div class="edit">
        <a href="{{ route('admin.users.edit', $object->uuid) }}"
            title="Edit"><span class="badge  badge-primary"><i
                    class="las la-edit text-white"></i></span></a>
        </a>
    </div>
    {{-- @endcan --}}
    {{-- @can('user-delete') --}}
    <div class="remove">
        <a href="#" class="remove-item-btn" data-bs-toggle="modal"
            data-id="{{ $object->uuid }}"
            data-route-name="{{ route('admin.users.destroy', 'delete') }}">
            <span class="badge  badge-danger"><i
                    class="las la-trash text-white"></i></span></a>
    </div>
    {{-- @endcan --}}
</div>
