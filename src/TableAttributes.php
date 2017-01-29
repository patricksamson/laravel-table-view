<?php

namespace Lykegenes\TableView;

use Lykegenes\TableView\Helpers\HtmlAttributes;

class TableAttributes extends HtmlAttributes
{
    public function __construct()
    {
        $this->attributes = config('tableview.default-table-attributes', []);
    }

    public function setDefaultSort($column, $order = 'asc')
    {
        $this->set(':default-sort', "{ prop: '$column', order: '$order' }");
    }
}
