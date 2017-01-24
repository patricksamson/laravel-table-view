<?php

namespace Lykegenes\TableView\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class SearchCriteria implements CriteriaInterface
{
    private $field;
    private $search;

    public function __construct($field, $search) {
        $this->field = $field;
        $this->search = '%' . $search . '%';
    }

    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where($this->field, 'like', $this->search);
    }
}
