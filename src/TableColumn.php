<?php

namespace Lykegenes\TableView;

class TableColumn {

    protected $attribute;
    protected $label;

    public function __construct($attribute, $label) {
        $this->attribute = $attribute;
        $this->label = $label;
    }
}
