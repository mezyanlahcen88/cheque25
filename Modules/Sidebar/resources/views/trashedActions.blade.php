    <div class="d-flex justify-content-center gap-2">
        @can('sidebar-restore')
        <form action="{{ route('sidebar.restore', $object->id)}}" method="POST" id="restoreForm">
            @csrf
            @method('PUT')

            <a href="#" onclick="$('#restoreForm').submit()"
            title="Restore"><span class="badge  text-bg-success"><i
                class="las la-undo-alt text-white"></i></span></a>
        </form>
        @endcan
        @can('sidebar-force-delete')
            <div class="remove">
                <a href="#" class="remove-item-btn" data-bs-toggle="modal"
                data-id="{{ $object->id }}" data-route-name="{{ route('sidebar.forceDelete', $object->id ) }}">
              <span class="badge  text-bg-danger"><i class="las la-trash text-white"></i></span></a>
            </div>
        @endcan
    </div>
