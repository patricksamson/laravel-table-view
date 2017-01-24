<?php

namespace Lykegenes\TableView\Helpers;

use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Contracts\View\Factory as View;
use Illuminate\Http\Request;

class TableViewHelper {

    /**
     * @var View
     */
    protected $view;

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @param View    $view
     * @param Request $request
     * @param Config  $config
     */
    public function __construct(View $view, Request $request, Config $config)
    {
        $this->view = $view;
        $this->config = $config;
        $this->request = $request;
    }

    /**
     * @param string $key
     * @param string $default
     * @return string
     */
    public function getConfig($key, $default = null)
    {
        return $this->config->get('tableview.'.$key, $default);
    }

    /**
     * @return View
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }
}
