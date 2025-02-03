<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MultipleSelectGroupe extends Component
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
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.multiple-select-groupe');
    }
}
