<?php

namespace Lykegenes\TableView\Helpers;

class HtmlAttributes
{
    protected $attributes = [];

    public function __construct($attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function set($name, $value = true)
    {
        if ($name !== null) {
            $this->attributes[$name] = $value;
        }
    }

    public function get($name)
    {
        if (array_key_exists($name, $this->attributes)) {
            return $this->attributes[$name];
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
