<?php

namespace Lykegenes\TableView;

use Illuminate\Support\Facades\View;

class TableColumn {

    protected $attribute;
    protected $label;

    public function __construct($attribute, $label) {
        $this->attribute = $attribute;
        $this->label = $label;
    }

    public function getAttribute()
    {
        return $this->attribute;
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
