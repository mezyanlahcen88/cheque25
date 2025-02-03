<div class="{{ $cols }} my-1 {{ $divID ?? '' }} form-group">
    <div class="form-group">
        <label for="{{ $column }}">{{ trans('translation.' . $model . '_form_' . $column) }} &nbsp;
            <span class="{{ $optional }}">*</span></label>
        <textarea class="form-control summernote" name="{{ $column }}" id="{{ $column }}">{{ $columnValue }}</textarea>
        {{-- ckeditor --}}
    </div>
</div>
@error($column)
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
