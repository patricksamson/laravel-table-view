<?php

namespace Lykegenes\TableView\Columns;

use Illuminate\Support\Facades\View;
use Lykegenes\TableView\Contracts\TableColumnInterface;

class TemplateColumn implements TableColumnInterface
{
    protected $label;
    protected $template;

    public function __construct($label, $template)
    {
        $this->label = $label;
        $this->template = $template;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function render()
    {
        return View::make('tableview::column-template')
            ->with('column', $this)
            ->render();
    }
}
