<?php

namespace Lykegenes\TableView;

class TableAttributes
{
    protected $attributes = [];

    public function __construct()
    {
        $this->attributes = config('tableview.default-table-attributes', []);
    }

    public function setDefaultSort($column, $order = 'asc')
    {
        $this->attributes[':default-sort'] = "{ prop: '$column', order: '$order' }";
    }

    public function set($name, $value = true)
    {
        if ($name !== null) {
            $this->attributes[$name] = $value;
        }
    }

    public function render()
    {
        $result = [];

        foreach ($this->attributes as $name => $option) {
            if ($option !== null) {
                $name = is_numeric($name) ? $option : $name;
                $option = is_bool($option) ? ($option ? 'true' : 'false') : $option;
                $result[] = $name.'="'.$option.'" ';
            }
        }

        return implode('', $result);
    }
}
