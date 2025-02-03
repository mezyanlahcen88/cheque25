<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.city_action_add'),
            'listPermission' => 'city-list',
            'listRoute' => route('city.index'),
            'listText' => trans('translation.city_form_cities_list'),
        ])
    @endsection
    <form action="{{ route('city.update', $object->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            @include('components.dispaly_errors')
                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.city_action_edit')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                            <x-input-field cols="col-md-6" divId="name" column="name" model="city"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ $object->name }}" attribute="required" readonly="false" />
                            <x-single-select cols="col-md-6" div-id="state_id" column="state_id" model="city"
                                label="city_form_state_id" optional="text-danger" id="state_id" :options="states()" :object=$object />
                        </div>
                    </div>
                </div>
            </div>
            <x-update-button />
        </div>
    </form>
    @push('scripts')
    {!! JsValidator::formRequest('Modules\City\App\Http\Requests\UpdateCityRequest'); !!}
    @endpush
</x-default-layout>
