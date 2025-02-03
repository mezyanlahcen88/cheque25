<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_example">
    <thead>
        <!--begin::Table row-->
        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase">
            <th class="w-10px pe-2">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                        data-kt-check-target="#kt_datatable_example .form-check-input" value="1" />
                </div>
            </th>
            @foreach ($tableRows as $key => $value)
                <th class="text-center">{{ trans('translation.' . $model . '_table_' . $value) }} </th>
            @endforeach
            <th class="sort" data-sort="action">{{ trans('translation.general_general_action') }}
            </th>
        </tr>
        <!--end::Table row-->
    </thead>
    <tbody class="fw-semibold text-gray-600 p-1">
    </tbody>
</table>
