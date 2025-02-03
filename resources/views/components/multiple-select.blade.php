<div class="{{ $cols }} my-1" id="{{ $divID ?? '' }}">
    <div class="form-group">

        <label for="{{ $column }}" class="form-label"> {{ trans('translation.' . $label) }} &nbsp;
            <span class="{{ $optional }}">*</span></label>
        <select class="form-select @error($column) is-invalid @else is-valid @enderror" data-control="select2" multiple="multiple"
            data-placeholder="{{ trans('translation.general_general_select') }}" name="{{ $column }}"
            id="{{ $id ?? '' }}">
            <option value=""></option>
            @foreach ($options as $key => $value)
                @if ($object)
                    <option value="{{ $key }}" {{ $key == $object->$column ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @else
                    <option value="{{ $key }}" {{ $key == old($column) ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @endif
            @endforeach
        </select>
    </div>
    @error($column)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <div>
        <span class="text-danger error" id="error_{{ $column }}"></span>
    </div>
    {{-- <span id="{{ $column }}-error" class="help-block error-help-block error"></span> --}}
</div>


{{--how to call and use --}}
{{-- <x-multiple-select cols="col-md-4" div-id="project_type" column="project_type"
model="project" label="project_form_project_type" optional="text-danger"
id="project_type" :options="objects()" :object=false /> --}}
