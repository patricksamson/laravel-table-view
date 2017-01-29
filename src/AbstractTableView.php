<?php

namespace Lykegenes\TableView;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Lykegenes\TableView\Columns\TemplateColumn;

abstract class AbstractTableView
{
    /**
     * The Blade view to use for rendering.
     *
     * @var string
     */
    protected $view;

    /**
     * Collection of TableColumn.
     *
     * @var Illuminate\Support\Collection
     */
    protected $columns;

    /**
     * This table's attributes.
     *
     * @var [type]
     */
    protected $attributes;

    public function __construct()
    {
        $this->attributes = new TableAttributes();
        $this->columns = new Collection();
        $this->view = config('tableview.default-table-view');

        $this->build();

        return $this;
    }

    public function setView($view)
    {
        $this->view = $view;

        return $this;
    }

    /**
     * Get the Html Id used to bind a Vue.js instance.
     *
     * @return string A valid Html Id
     */
    public function getHtmlId()
    {
        // Generate a unique string et the "table-view-" prefix.
        return uniqid('table-view-');
    }

    /**
     * Get the API URL to query the data from.
     *
     * @return string A valid URL
     */
    abstract public function getApiUrl();

    /**
     * Build the table view by adding columns and setting parameters.
     *
     * @return mixed
     */
    abstract public function build();

    public function addColumn($label, $property)
    {
        $this->columns->push(new TableColumn($label, $property));

        return $this;
    }

    public function addTemplateColumn($label, $template)
    {
        $this->columns->push(new TemplateColumn($label, $template));

        return $this;
    }

    public function render()
    {
        return View::make($this->view)
                ->with('htmlId', $this->getHtmlId())
                ->with('apiURL', $this->getApiURL())
                ->with('columns', $this->columns)
                ->with('attributes', $this->attributes)
                ->render();
    }
}
