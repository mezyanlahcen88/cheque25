<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.role_action_add'),
            'listPermission' => 'role-list',
            'listRoute' => route('role.index'),
            'listText' => trans('translation.role_form_roles_list'),
        ])
    @endsection
    <form action="{{ route('role.update', $object->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">Title</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <x-input-field cols="col-md-12" divId="name" column="name" model="role"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ $object->name }}" attribute="required" readonly="false" />
                        </div>
                        <div class="row">
                            <label class="fs-5 fw-bold form-label mb-2">Role Permissions &nbsp;<span class="text-danger">*</span></label>

                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <tbody class="text-gray-600 fw-semibold">
                                        <tr>
                                            <td class="text-gray-800" style="width:10%">Administrator Access

                                                    <span class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                            class="path1"></span><span class="path2"></span><span
                                                            class="path3"></span></span>
                                                </span>
                                            </td>
                                            <td>
                                                <label
                                                    class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="kt_roles_select_all">
                                                    <span class="form-check-label" for="kt_roles_select_all">Select
                                                        all</span>
                                                </label>
                                            </td>
                                        </tr>
                                        @foreach ($groupes as $groupe)


                                        <tr>
                                            <td class="text-gray-800" style="width:18%">
                                                <div class="d-flex justify-content-between">
                                                    <label
                                                    class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                    <input class="form-check-input item-checkbox"
                                                        type="checkbox" value="{{ $groupe->name }}"
                                                        name="groupe">
                                                    <span
                                                        class="form-check-label">All {{ $groupe->name }} permissions</span>
                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row d-flex">
                                                    @foreach ($groupe->permissions as $permission)
                                                    <div class="col-md-3  my-1">
                                                    <label
                                                    class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                    <input class="form-check-input item-checkbox" type="checkbox"
                                                         value="{{$permission->id}}" name="permissions[]" {{in_array($permission->id , $rolePermissions) ? " checked" : ""}} data-groupe-name="{{ $groupe->name }}">
                                                    <span class="form-check-label">{{$permission->libele}}</span>
                                                </label>
                                            </div>
                                                    @endforeach

                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary">{{ trans('translation.general_general_save') }}</button>
            </div>
        </div>
    </form>
    @push('scripts')
    <script src="{{URL::asset('assets/js/modules/role-module.js')}}"></script>
    @endpush
</x-default-layout>
