<div class="d-flex text-start">

    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
        <a href="{{ route('project.edit', $object->id)}}">
            <div class="symbol-label">

                    @if($object->picture)
                    <img src="{{ URL::asset(getPicture($object->picture, '{{pluarl}}')) }}" alt="{{ $object->id }}"
                    class="w-100" />
                @else
                    <div class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $object->id) }}">
                        {{ substr($object->id, 0, 1) }}
                    </div>
                @endif
            </div>
        </a>
    </div>

    <div class="d-flex flex-column">
        <a href="{{ route('project.edit', $object->id)}}"
            class="text-gray-800 text-hover-primary mb-1">{{ $object->id }}</a>
        <span>{{ $object->picture }}</span>
    </div>

</div>
