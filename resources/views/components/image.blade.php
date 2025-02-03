<div class="d-flex text-start">
 
    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
        <a href="{{ route('user.edit', ['uuid' => $object->uuid, 'tab' => 'overview']) }}">
            <div class="symbol-label">

                    @if($object->picture)
                    <img src="{{ URL::asset(getPicture($object->picture, 'users')) }}" alt="{{ $object->getFullName() }}"
                    class="w-100" />
                @else
                    <div class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $object->first_name) }}">
                        {{ substr($object->first_name, 0, 1) }}
                    </div>
                @endif
            </div>
        </a>
    </div>

    <div class="d-flex flex-column">
        <a href="{{ route('user.edit',  ['uuid' => $object->uuid, 'tab' => 'overview']) }}"
            class="text-gray-800 text-hover-primary mb-1">{{ $object->getFullName() }}</a>
        <span>{{ $object->email }}</span>
    </div>

</div>
