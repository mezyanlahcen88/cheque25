<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable"
    data-columns={{ $columns }} data-route ='/language/get-translations-json'>
    <thead>
        <!--begin::Table row-->
        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase">
            <th class="w-10px pe-2">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                        data-kt-check-target="#kt_datatable .form-check-input" value="1" />
                </div>
            </th>
                <th class="text-center">{{ trans('translation.languagetranslate_table_model') }} </th>
                <th class="text-center">{{ trans('translation.languagetranslate_table_label') }} </th>
                <th class="text-center">{{ trans('translation.languagetranslate_table_translation') }} </th>

        </tr>
        <!--end::Table row-->
    </thead>
    <tbody class="fw-semibold text-gray-600 p-1">
    </tbody>
</table>
