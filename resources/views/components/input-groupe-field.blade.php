<div class="{{ $cols }} my-1" id="{{ $divID.'Div' }}">
    <label for={{ $column }} class="form-label">{{ trans('translation.' . $model . '_form_' . $column) }} &nbsp;<span class="{{ $optional }}">*</span>
    </label>

    <div class="input-group mb-5">
    <input type="{{ $inputType }}" class="form-control {{ $className ?? '' }} @error($column) is-invalid @enderror"
        name="{{ $column }}" id="{{ $columnId ?? '' }}" aria-describedby="{{ $column }}"
        placeholder="{{ trans('translation.' . $model . '_form_' . $column . '_placeholder') }}" value="{{ $columnValue }}"
        {{ $attribute ?? '' }} {{ $readonly ?? '' }}>
        <span class="input-group-text" id="{{ $column.'Span' }}">{{ $groupText }}</span>

    </div>

    @error($column)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <div class="ajaxError">
        {{-- <span class="help-block error-help-block error"  id="{{ $column }}-error"></span> --}}
    </div>
</div>
{{-- ow to use --}}
{{-- <x-input-groupe-field cols="col-md-6" divID="price" column="price" model="plantype"
optional="text-danger" inputType="number" className="" columnId="price"
columnValue="{{ old('price') }}" attribute="required" readonly="false" groupText="DH"/> --}}
