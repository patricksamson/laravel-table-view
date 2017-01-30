<?php

namespace Lykegenes\TableView\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class SearchCriteria implements CriteriaInterface
{
    private $fields;
    private $search;

    public function __construct($fields, $search)
    {
        $this->fields = $fields;
        $this->search = '%'.$search.'%';
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (is_array($this->fields)) {
            return $model->where(function ($query) {
                foreach ($this->fields as $field) {
                    $query->orWhere($field, 'like', $this->search);
                }
            });
        }

        return $model->where($this->fields, 'like', $this->search);
    }
}
