<?php

// app/View/Components/SingleSelect.php

namespace App\View\Components;

use Illuminate\View\Component;

class SingleSelect extends Component
{
    public $cols;
    public $divID;
    public $column;
    public $label;
    public $optional;
    public $id;
    public $options;
    public $object;

    public function __construct(
        $cols,
        $column,
        $label,
        $optional = '',
        $id = '',
        $options = [],
        $object = null,
        $divID = ''
    ) {
        $this->cols = $cols;
        $this->divID = $divID;
        $this->column = $column;
        $this->label = $label;
        $this->optional = $optional;
        $this->id = $id;
        $this->options = $options;
        $this->object = $object;
    }

    public function render()
    {
        return view('components.single-select');
    }
}
