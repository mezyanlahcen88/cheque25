<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputCheckboxField extends Component
{
    public $cols;
    public $divID;
    public $column;
    public $model;
    public $optional;
    public $columnValue;

    public function __construct($cols, $column, $model, $optional = '', $columnValue = '', $divID = '')
    {
        $this->cols = $cols;
        $this->column = $column;
        $this->model = $model;
        $this->optional = $optional;
        $this->columnValue = $columnValue;
        $this->divID = $divID;
    }

    public function render()
    {
        return view('components.input-checkbox-field');
    }
}
// //
// how to use
// <x-input-checkbox-field
//     cols="col-md-6"
//     column="example_column"
//     model="example_model"
//     optional="optional-class"
//     columnValue="1"
//     divID="exampleDivId"
// />
