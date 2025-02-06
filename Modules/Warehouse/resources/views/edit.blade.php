<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.warehouse_action_add'),
            'listPermission' => 'warehouse-list',
            'listRoute' => route('warehouse.index'),
            'listText' => trans('translation.warehouse_form_warehouses_list'),
        ])
    @endsection
    <form action="{{ route('warehouse.update', $object->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            @include('components.dispaly_errors')
                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.warehouse_action_edit')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                            <x-input-field cols="col-md-6" divId="name" column="name" model="warehouse"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ $object->name }}" attribute="required" readonly="false" />
                                <x-single-select cols="col-md-6" div-id="type" column="type" model="warehouse"
                                label="product_form_type" optional="text-danger" id="type" :options="warehouseTypes()"
                                :object=$object />
                            <x-input-field cols="col-md-6" divId="address" column="address" model="warehouse"
                                optional="text-danger" inputType="text" className="" columnId="address"
                                columnValue="{{ $object->address }}" attribute="required" readonly="false" />
                            <x-input-checkbox-field
                                cols="col-md-6"
                                column="active"
                                model="warehouse"
                                optional="text-danger"
                                columnValue="{{ $object->active }}"
                                divID="active"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <x-update-button />
        </div>
    </form>
    @push('scripts')
    {!! JsValidator::formRequest('Modules\Warehouse\App\Http\Requests\UpdateWarehouseRequest'); !!}
    @endpush
</x-default-layout>
