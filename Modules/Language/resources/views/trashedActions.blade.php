    <div class="d-flex justify-content-center gap-2">
        @can('language-restore')
        <form action="{{ route('language.restore', $object->id)}}" method="POST" id="restoreForm">
            @csrf
            @method('PUT')

            <a href="#" onclick="$('#restoreForm').submit()"
            title="Restore"><span class="badge  text-bg-success"><i
                class="las la-undo-alt"></i></span></a>
        </form>
        @endcan
        @can('language-force-delete')
            <div class="remove">
                <a href="#" class="remove-item-btn" data-bs-toggle="modal"
                data-id="{{ $object->id }}" data-route-name="{{ route('language.forceDelete', $object->id) }}">
              <span class="badge  text-bg-danger"><i class="las la-trash"></i></span></a>
            </div>
        @endcan
    </div>
