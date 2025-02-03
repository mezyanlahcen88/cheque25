<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.agency_action_add'),
            'listPermission' => 'agency-list',
            'listRoute' => route('agency.index'),
            'listText' => trans('translation.agency_form_agencies_list'),
        ])
    @endsection
    <form action="{{ route('agency.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            @include('components.dispaly_errors')

                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.agency_action_add')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                            <x-input-field cols="col-md-6" divId="name" column="name" model="agency"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ old('name') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="address" column="address" model="agency"
                                optional="text-danger" inputType="text" className="" columnId="address"
                                columnValue="{{ old('address') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="phone" column="phone" model="agency"
                                optional="text-danger" inputType="text" className="" columnId="phone"
                                columnValue="{{ old('phone') }}" attribute="unique:agencies" readonly="false" />
                            <x-input-field cols="col-md-6" divId="fix" column="fix" model="agency"
                                optional="text-danger" inputType="text" className="" columnId="fix"
                                columnValue="{{ old('fix') }}" attribute="required" readonly="false" />
                            <x-single-select cols="col-md-6" div-id="bank_id" column="bank_id" model="agency"
                                label="agency_form_bank_id" optional="text-danger" id="bank_id" :options="banks()" :object=false />
                        </div>
                    </div>
                </div>
            </div>
                <x-save-button />
        </div>
    </form>
    @push('scripts')
    {!! JsValidator::formRequest('Modules\Agency\App\Http\Requests\StoreAgencyRequest'); !!}
    @endpush
</x-default-layout>
