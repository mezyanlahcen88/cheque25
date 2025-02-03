<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb', [
            'title' => trans('translation.permission_form_manage_permissions'),
            'createPermission' => 'permission-create',
            'createRoute' => route('permission.create'),
            'createText' => trans('translation.permission_action_add'),
            'deletedPermission' => 'permission-trashed',
            'deletedRoute' => route('permission.trashed'),
            'deletedText' => trans('translation.permission_form_deleted_permissions_list'),
        ])
          @endsection
    <div class="row">
        <div class="col-md-12">
            <div class="card card-bordered">
                <div class="card-header">
                    <h3 class="card-title">give user permissions</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <x-single-select cols="col-md-4" div-id="gender" column="gender" model="user"
                        label="user_form_gender" optional="text-danger" id="gender" :options="genders()"
                        :object=false />
                        <div class="row d-flex">
                            @foreach ($permissions as $permission)
                                <div class="col-md-4 my-1">
                                    <label
                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                        <input class="form-check-input item-checkbox"
                                            type="checkbox" value="{{ $permission->id }}"
                                            name="permissions[]">
                                        <span
                                            class="form-check-label">{{ $permission->libele }}</span>
                                    </label>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @push('scripts')
    @endpush

</x-default-layout>
