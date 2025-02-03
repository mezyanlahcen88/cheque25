<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.sidebar_action_add'),
            'listPermission' => 'sidebar-list',
            'listRoute' => route('sidebar.index'),
            'listText' => trans('translation.sidebar_form_sidebars_list'),
        ])
    @endsection
    <form action="{{ route('sidebar.update', $object->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.sidebar_action_edit')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <x-input-field cols="col-md-6" divId="name" column="name" model="sidebar"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ $object->name }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="icon" column="icon" model="sidebar"
                                optional="text-primary" inputType="text" className="" columnId="icon"
                                columnValue="{{ $object->icon }}" attribute="" readonly="false" />
                                <x-single-select cols="col-md-6" div-id="permission" column="permission" model="sidebar"
                                label="sidebar_form_permission" optional="text-primary" id="permission" :options="permissions()" :object=$object />
                            <x-single-select cols="col-md-6" div-id="sidebar_id" column="sidebar_id" model="sidebar"
                                label="sidebar_form_sidebar_id" optional="text-primary" id="sidebar_id" :options="sidebars()" :object=$object />
                            <x-input-field cols="col-md-6" divId="order" column="order" model="sidebar"
                                optional="text-danger" inputType="number" className="" columnId="order"
                                columnValue="{{ $object->order }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="route" column="route" model="sidebar"
                                optional="text-primary" inputType="text" className="" columnId="route"
                                columnValue="{{ $object->route }}" attribute="" readonly="false" />
                            <x-input-field cols="col-md-6 d-none" divId="type" column="type" model="sidebar"
                                optional="text-danger" inputType="text" className="" columnId="type"
                                columnValue="{{ $object->type }}" attribute="required" readonly="readonly" />
                        </div>
                    </div>
                </div>
            </div>
<x-update-button />
        </div>
    </form>
    @push('scripts')
    {!! JsValidator::formRequest('Modules\Sidebar\App\Http\Requests\UpdateSidebarRequest'); !!}
    @endpush
</x-default-layout>
