<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.numerotation_action_add'),
            'listPermission' => 'numerotation-list',
            'listRoute' => route('numerotation.index'),
            'listText' => trans('translation.numerotation_form_numerotations_list'),
        ])
    @endsection
    <form action="{{ route('numerotation.update', $object->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.numerotation_action_edit')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                            <x-input-field cols="col-md-6" divId="doc_type" column="doc_type" model="numerotation"
                                optional="text-danger" inputType="text" className="" columnId="doc_type"
                                columnValue="{{ $object->doc_type }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="prefix" column="prefix" model="numerotation"
                                optional="text-danger" inputType="text" className="" columnId="prefix"
                                columnValue="{{ $object->prefix }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="increment_num" column="increment_num" model="numerotation"
                                optional="text-danger" inputType="number" className="" columnId="increment_num"
                                columnValue="{{ $object->increment_num }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="comment" column="comment" model="numerotation"
                                optional="text-primary" inputType="textarea" className="" columnId="comment"
                                columnValue="{{ $object->comment }}" attribute="" readonly="false" />
                        </div>
                    </div>
                </div>
            </div>
<x-update-button />
        </div>
    </form>
    @push('scripts')
    {!! JsValidator::formRequest('Modules\Numerotation\App\Http\Requests\UpdateNumerotationRequest'); !!}
    @endpush
</x-default-layout>
