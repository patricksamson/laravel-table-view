<?php

namespace Lykegenes\TableView;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Lykegenes\TableView\Columns\BasicColumn;
use Lykegenes\TableView\Columns\TemplateColumn;
use Lykegenes\TableView\Helpers\HtmlAttributes;

abstract class AbstractTableView
{
    protected $htmlId;

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
     * @var Lykegenes\TableView\TableAttributes
     */
    protected $attributes;

    public function __construct()
    {
        $this->attributes = new HtmlAttributes(config('tableview.default-table-attributes', []));
        $this->columns = new Collection();
        $this->view = config('tableview.default-table-view');

        $this->build();

        return $this;
    }

    /**
     * Set the Blade view to use for rendering the table.
     *
     * @param string $view the view path
     *
     * @return $this
     */
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
        return $this->htmlId ?: uniqid('table-view-');
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
     * @return $this
     */
    abstract public function build();

    /**
     * Add a basic column to the table.
     *
     * @param string $label      This column title to shown in the table header
     * @param string $property   The key of this column's data in the API response
     * @param array  $attributes This column attributes
     *
     * @return $this
     */
    public function addColumn($label, $property, $attributes = [])
    {
        $col = new BasicColumn($label, $property);

        foreach ($attributes as $key => $value) {
            $col->getHtmlAttributes()->set($key, $value);
        }

        $this->columns->push($col);

        return $this;
    }

    /**
     * Add a custom column template to the table.
     *
     * @param string $label      This column title to shown in the table header
     * @param string $template   The path to the Blade view template
     * @param array  $attributes This column attributes
     *
     * @return $this
     */
    public function addTemplateColumn($label, $template, $attributes = [])
    {
        $col = new TemplateColumn($label, $template);

        foreach ($attributes as $key => $value) {
            $col->getHtmlAttributes()->set($key, $value);
        }

        $this->columns->push($col);

        return $this;
    }

    /**
     * Get this table's attributes.
     *
     * @return Lykgenes/TableView/Helpers/HtmlAttributes This table Html attributes.
     */
    public function getHtmlAttributes()
    {
        return $this->attributes;
    }

    /**
     * Set the default column and order to sort this table.
     *
     * @param string $column The column key.
     * @param string $order  The order to sort on (ascending or descending).
     */
    public function setDefaultSort($column, $order = 'ascending')
    {
        switch ($order) {
            case 'desc':
            case 'descending':
            case -1:
                $order = 'descending';
                break;

            default:
                $order = 'ascending';
                break;
        }

        $this->attributes->set(':default-sort', "{ prop: '$column', order: '$order' }");
    }

    /**
     * Render the Blade table view.
     *
     * @return mixed The rendered Blade view
     */
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
