<?php

namespace Lykegenes\TableView\Columns;

class TemplateColumn extends AbstractColumn
{
    protected $viewName = 'tableview::column-template';

    protected $template;

    public function __construct($label, $template)
    {
        parent::__construct($label);

        $this->template = $template;
    }

    public function getTemplate()
    {
        return $this->template;
    }
}
