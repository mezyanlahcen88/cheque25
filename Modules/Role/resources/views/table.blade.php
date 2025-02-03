<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_example">
    <thead>
        <!--begin::Table row-->
        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase">

            <td>{{ trans('translation.role_table_name')}}</td>
            <td>{{ trans('translation.role_table_status')}}</td>
            <th class="sort" data-sort="action">{{ trans('translation.general_general_action') }}
            </th>
        </tr>
        <!--end::Table row-->
    </thead>
    <tbody class="fw-semibold text-gray-600 p-1">
        @foreach ($objects as $object)
            <tr class="text-center">

<td>{{$object->name}}</td>

                <td>
                    @include('role::actions')
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
