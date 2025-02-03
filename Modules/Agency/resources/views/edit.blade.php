<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.agency_action_add'),
            'listPermission' => 'agency-list',
            'listRoute' => route('agency.index'),
            'listText' => trans('translation.agency_form_agencies_list'),
        ])
    @endsection
    <form action="{{ route('agency.update', $object->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            @include('components.dispaly_errors')
                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.agency_action_edit')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                            <x-input-field cols="col-md-6" divId="name" column="name" model="agency"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ $object->name }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="address" column="address" model="agency"
                                optional="text-danger" inputType="text" className="" columnId="address"
                                columnValue="{{ $object->address }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="phone" column="phone" model="agency"
                                optional="text-danger" inputType="text" className="" columnId="phone"
                                columnValue="{{ $object->phone }}" attribute="unique:agencies" readonly="false" />
                            <x-input-field cols="col-md-6" divId="fix" column="fix" model="agency"
                                optional="text-danger" inputType="text" className="" columnId="fix"
                                columnValue="{{ $object->fix }}" attribute="required" readonly="false" />
                            <x-single-select cols="col-md-6" div-id="bank_id" column="bank_id" model="agency"
                                label="agency_form_bank_id" optional="text-danger" id="bank_id" :options="banks()" :object=$object />
                        </div>
                    </div>
                </div>
            </div>
            <x-update-button />
        </div>
    </form>
    @push('scripts')
    {!! JsValidator::formRequest('Modules\Agency\App\Http\Requests\UpdateAgencyRequest'); !!}
    @endpush
</x-default-layout>
