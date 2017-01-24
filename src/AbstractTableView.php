<?php

namespace Lykegenes\TableView;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;

abstract class AbstractTableView {

    /**
     * The Blade view to use for rendering.
     *
     * @var string
     */
    protected $view;

    /**
     * Collection of TableColumn
     *
     * @var Collection
     */
    protected $columns;

    public function __construct()
    {
        $this->columns = new Collection();
        $this->view = config('tableview.default-table-view');

        return $this;
    }

    public function setView($view)
    {
        $this->view = $view;

        return $this;
    }

    public function addColumn($attribute, $label)
    {
        $this->columns->push(new TableColumn($attribute, $label));

        return $this;
    }

    public function render()
    {
        return View::make($this->view)->render();
    }
}
