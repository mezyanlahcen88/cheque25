<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputRadioField extends Component
{
    public $cols;
    public $divID;
    public $column;
    public $model;
    public $optional;
    public $trueText;
    public $falseText;
    public $columnValue;

    public function __construct($cols, $column, $model, $optional = '', $trueText = 'Yes', $falseText = 'No', $columnValue = '1', $divID = '')
    {
        $this->cols = $cols;
        $this->column = $column;
        $this->model = $model;
        $this->optional = $optional;
        $this->trueText = $trueText;
        $this->falseText = $falseText;
        $this->columnValue = $columnValue;
        $this->divID = $divID;
    }

    public function render()
    {
        return view('components.input-radio-field');
    }
}
