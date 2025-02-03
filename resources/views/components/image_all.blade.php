<div class="d-flex text-start">

    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
        <a href="{{ route('{{lowerName}}.edit', $object->id)}}">
            <div class="symbol-label">

                    @if($object->picture)
                    <img src="{{ URL::asset(getPicture($object->picture, '{{pluarl}}')) }}" alt="{{ $object->firstColumn }}"
                    class="w-100" />
                @else
                    <div class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $object->firstColumn) }}">
                        {{ substr($object->firstColumn, 0, 1) }}
                    </div>
                @endif
            </div>
        </a>
    </div>

    <div class="d-flex flex-column">
        <a href="{{ route('{{lowerName}}.edit', $object->id)}}"
            class="text-gray-800 text-hover-primary mb-1">{{ $object->firstColumn }}</a>
        <span>{{ $object->secondColumn }}</span>
    </div>

</div>
