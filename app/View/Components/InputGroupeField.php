<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputGroupeField extends Component
{
    public $cols;
    public $divID;
    public $column;
    public $inputType;
    public $className;
    public $columnId;
    public $attribute;
    public $readonly;
    public $optional;
    public $columnValue;
    public $groupText;
    public $model;

    public function __construct($cols, $divID, $column, $inputType, $className = '', $columnId = '', $attribute = '', $readonly = '', $optional = '', $columnValue = '', $groupText = '', $model = '')
    {
        $this->cols = $cols;
        $this->divID = $divID;
        $this->column = $column;
        $this->inputType = $inputType;
        $this->className = $className;
        $this->columnId = $columnId;
        $this->attribute = $attribute;
        $this->readonly = $readonly;
        $this->optional = $optional;
        $this->columnValue = $columnValue;
        $this->groupText = $groupText;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-groupe-field');
    }
}
