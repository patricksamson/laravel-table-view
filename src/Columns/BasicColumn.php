<?php

namespace Lykegenes\TableView\Columns;

class BasicColumn extends AbstractColumn
{
    protected $viewName = 'tableview::column-basic';

    public function __construct($label, $prop)
    {
        parent::__construct($label);

        $this->setProperty($prop);
    }

    public function getProperty()
    {
        return $this->attributes->get('prop');
    }

    public function setProperty($prop)
    {
        $this->attributes->set('prop', $prop);
    }
}
