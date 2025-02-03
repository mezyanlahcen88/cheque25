    <div class="d-flex justify-content-center gap-2">
        @can('society-restore')
        <form action="{{ route('society.restore', $object->id)}}" method="POST" id="restoreForm">
            @csrf
            @method('PUT')

            <a href="#" onclick="$('#restoreForm').submit()"
            title="Restore"><span class="badge  text-bg-success"><i
                class="las la-undo-alt text-white"></i></span></a>
        </form>
        @endcan
        @can('society-force-delete')
            <div class="remove">
                <a href="#" class="remove-item-btn" data-bs-toggle="modal"
                data-id="{{ $object->id }}" data-route-name="{{ route('society.destroy', 'delete') }}">
              <span class="badge  text-bg-danger"><i class="las la-trash text-white"></i></span></a>
            </div>
        @endcan
    </div>
