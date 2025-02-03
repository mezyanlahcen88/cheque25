<table class="table align-middle border rounded table-row-dashed fs-6 g-5 px-4"
id="kt_datatable"
data-columns = {{$columns}}
data-route = '/client/get-clients-json'>
<thead>

    <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
        <th class="w-10px pe-2">
            <div class="form-check form-check-sm form-check-custom form-check-solid me-3 select-all">
                <input class="form-check-input select-all" type="checkbox" data-kt-check="true"
                    data-kt-check-target="#kt_datatable .select-one" value="1" />
            </div>
        </th>
        @foreach ($tableRows as $key => $value)
        <th>{{ trans('translation.' . $model . '_table_' . $value) }} </th>
        @endforeach
        <th class="sort" data-sort="action">{{ trans('translation.general_general_action') }}
        </th>
    </tr>
</thead>
<tbody class="fw-semibold text-gray-600">
</tbody>
</table>
