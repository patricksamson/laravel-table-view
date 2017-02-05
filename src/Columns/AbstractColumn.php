<?php

namespace Lykegenes\TableView\Columns;

use Lykegenes\TableView\Contracts\ColumnInterface;
use Lykegenes\TableView\Helpers\HtmlAttributes;

class AbstractColumn implements ColumnInterface
{
    protected $attributes;

    protected $viewName = 'tableview::column-basic';

    public function __construct($label)
    {
        $this->attributes = new HtmlAttributes(config('tableview.default-column-attributes', []));

        $this->setLabel($label);
    }

    /**
     * Get this column's title in the table header.
     *
     * @return string This column label.
     */
    public function getLabel()
    {
        return $this->attributes->get('label');
    }

    /**
     * Set this column's title in the table header.
     *
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->attributes->set('label', $label);
    }

    /**
     * Get this column's attributes.
     *
     * @return Lykgenes/TableView/Helpers/HtmlAttributes This column Html attributes.
     */
    public function getHtmlAttributes()
    {
        return $this->attributes;
    }

    /**
     * Get the Blade view to use for rendering the column.
     *
     * @return string The Blade view name.
     */
    public function getViewName()
    {
        return $this->viewName;
    }
}
