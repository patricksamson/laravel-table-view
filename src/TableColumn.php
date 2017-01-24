<?php

namespace Lykegenes\TableView;

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
}
