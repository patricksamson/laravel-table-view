<?php

namespace Lykegenes\TableView;

use Illuminate\Support\Facades\View;

class TableColumn
{
    protected $prop;
    protected $label;

    public function __construct($label, $prop)
    {
        $this->prop = $prop;
        $this->label = $label;
    }

    public function getProp()
    {
        return $this->prop;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel($label)
    {
        $this->label = $label;
    }

    public function render()
    {
        return View::make('tableview::column-basic')
            ->with('column', $this)
            ->render();
    }
}
