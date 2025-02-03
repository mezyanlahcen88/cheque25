<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.city_action_add'),
            'listPermission' => 'city-list',
            'listRoute' => route('city.index'),
            'listText' => trans('translation.city_form_cities_list'),
        ])
    @endsection
    <form action="{{ route('city.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            @include('components.dispaly_errors')

                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.city_action_add')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                            <x-input-field cols="col-md-6" divId="name" column="name" model="city"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ old('name') }}" attribute="required" readonly="false" />
                            <x-single-select cols="col-md-6" div-id="state_id" column="state_id" model="city"
                                label="city_form_state_id" optional="text-danger" id="state_id" :options="states()" :object=false />
                        </div>
                    </div>
                </div>
            </div>
                <x-save-button />
        </div>
    </form>
    @push('scripts')
    {!! JsValidator::formRequest('Modules\City\App\Http\Requests\StoreCityRequest'); !!}
    @endpush
</x-default-layout>
