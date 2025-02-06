<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.warehouse_action_add'),
            'listPermission' => 'warehouse-list',
            'listRoute' => route('warehouse.index'),
            'listText' => trans('translation.warehouse_form_warehouses_list'),
        ])
    @endsection
    <form action="{{ route('warehouse.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            @include('components.dispaly_errors')

                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.warehouse_action_add')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                            <x-input-field cols="col-md-6" divId="name" column="name" model="warehouse"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ old('name') }}" attribute="required" readonly="false" />
                                <x-single-select cols="col-md-6" div-id="type" column="type" model="warehouse"
                                label="warehouse_form_type" optional="text-danger" id="type" :options="warehouseTypes()"
                                :object=false />
                            <x-input-field cols="col-md-6" divId="address" column="address" model="warehouse"
                                optional="text-primary" inputType="text" className="" columnId="address"
                                columnValue="{{ old('address') }}" attribute="required" readonly="false" />
                            
                        </div>
                    </div>
                </div>
            </div>
                <x-save-button />
        </div>
    </form>
    @push('scripts')
    {!! JsValidator::formRequest('Modules\Warehouse\App\Http\Requests\StoreWarehouseRequest'); !!}
    @endpush
</x-default-layout>
