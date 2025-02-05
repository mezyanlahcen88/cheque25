<div class="{{ $cols }} my-1 {{ $divID ?? '' }}">
    <label for={{ $column }} class="form-label">{{ trans('translation.' . $model . '_form_' . $column) }} &nbsp;<span
            class="{{ $optional }}">*</span></label>

    <div class="form-check form-switch form-check-custom form-check-solid">
        <input class="form-check-input" type="checkbox" value="{{ $columnValue }}" id="{{ $column }}"
            name="{{ $column }}" {{ $columnValue ? 'checked' : ''}}/>
        <label class="form-check-label" for="{{ $column }}">
            {{ trans('translation.' . $model . '_form_' . $column) }}
        </label>
    </div>
    @error($column)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>
