<div class="d-flex justify-content-center gap-2">
            {{-- @can('language-edit') --}}
            <div class="translation">
                <a href="{{ route('language.translations', $object->id)}}" title="Translation"><span class="badge  badge-primary"><i class="las la-language text-white"></i></span></a>
                </a>
            </div>
        {{-- @endcan --}}

       {{-- @can('language-delete') --}}
            <div class="remove">
                <a href="#" class="remove-item-btn" data-bs-toggle="modal"
                data-id="{{ $object->id }}" data-route-name="{{ route('language.destroy', 'delete') }}">
              <span class="badge  badge-danger"><i class="las la-trash text-white"></i></span></a>
            </div>
        {{-- @endcan --}}
</div>

