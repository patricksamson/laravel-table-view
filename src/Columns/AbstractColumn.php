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

    public function getLabel()
    {
        return $this->attributes->get('label');
    }

    public function setLabel($label)
    {
        $this->attributes->set('label', $label);
    }

    public function getHtmlAttributes()
    {
        return $this->attributes;
    }

    public function getViewName()
    {
        return $this->viewName;
    }
}
