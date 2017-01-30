<?php

namespace Lykegenes\TableView\Contracts;

interface ColumnInterface
{
    public function setLabel($label);

    public function getLabel();

    public function getHtmlAttributes();

    public function getViewName();
}
