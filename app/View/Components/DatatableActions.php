<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DatatableActions extends Component
{
    public $multipleDeletePermission;
    public $multipleDeleteRoute;
    public $multipleActivatePermission;
    public $multipleActivateRoute;
    public $multipleRestorePermission;
    public $multipleRestoreRoute;
    public $activateRoute;
    public $restoreRoute;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $multipleDeletePermission,
        $multipleDeleteRoute,
        $multipleActivatePermission,
        $multipleActivateRoute,
        $multipleRestorePermission,
        $multipleRestoreRoute,
        $activateRoute,
        $restoreRoute
    ) {
        $this->multipleDeletePermission = $multipleDeletePermission;
        $this->multipleDeleteRoute = $multipleDeleteRoute;
        $this->multipleActivatePermission = $multipleActivatePermission;
        $this->multipleActivateRoute = $multipleActivateRoute;
        $this->multipleRestorePermission = $multipleRestorePermission;
        $this->multipleRestoreRoute = $multipleRestoreRoute;
        $this->activateRoute = $activateRoute;
        $this->restoreRoute = $restoreRoute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.datatable-actions');
    }
}
