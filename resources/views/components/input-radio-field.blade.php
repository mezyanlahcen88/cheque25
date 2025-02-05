<div class="{{ $cols }} my-1 {{ $divID ?? '' }}">
    <label for={{ $column }} class="form-label">{{ trans('translation.' . $model . '_form_' . $column) }}
        &nbsp;<span class="{{ $optional }}">*</span></label>
    <div class="d-flex justify-content-around">
        <div class="form-check form-check-custom form-check-success form-check-solid">
            <input class="form-check-input" type="radio"  checked value="1" {{ $columnValue == 1 ? 'checked' : '' }} id="{{ $column }}_1"
                name="{{ $column }}" />
            <label class="form-check-label" for="{{ $column }}_1">
                {{ $trueText }}
            </label>
        </div>
        <div class="form-check form-check-custom form-check-warning form-check-solid">
            <input class="form-check-input" type="radio" value="0" {{ $columnValue == 0 ? 'checked' : '' }} id="{{ $column }}_0" name="{{ $column }}" />
            <label class="form-check-label" for="{{ $column }}_0">
                {{ $falseText }}
            </label>
        </div>
    </div>
    @error($column)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- how to use --}}
{{-- <x-input-radio-field cols="col-md-6" column="tranchable" model="project"
optional="text-primary" trueText="Yes" falseText="No"
columnValue="{{ old('tranchable') }}" divID="tranchable" /> --}}
