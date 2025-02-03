<div class="d-flex justify-content-center gap-2">
        @can('society-edit')
            <div class="edit">
                <a href="{{ route('society.edit', $object->id)}}" title="Edit"><span class="badge  badge-primary"><i class="las la-edit text-white"></i></span></a>
                </a>
            </div>
        @endcan
       @can('society-delete')
            <div class="remove">
                <a href="#" class="remove-item-btn" data-bs-toggle="modal"
                data-id="{{ $object->id }}" data-route-name="{{ route('society.destroy', 'delete') }}">
              <span class="badge  badge-danger"><i class="las la-trash text-white"></i></span></a>
            </div>
        @endcan
</div>

