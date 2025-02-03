<div class="d-flex text-start">

    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
        <a href="{{ route('category.edit', $object->id)}}">
            <div class="symbol-label">

                    @if($object->picture)
                    <img src="{{ URL::asset(getPicture($object->picture, 'categories')) }}" alt="{{ $object->category_id }}"
                    class="w-100" />
                @else
                    <div class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $object->category_id) }}">
                        {{ substr($object->category_id, 0, 1) }}
                    </div>
                @endif
            </div>
        </a>
    </div>

    <div class="d-flex flex-column">
        <a href="{{ route('category.edit', $object->id)}}"
            class="text-gray-800 text-hover-primary mb-1">{{ $object->category_id }}</a>
        <span>{{ $object->description }}</span>
    </div>

</div>
