<?php

class TableRenderingTest extends Orchestra\Testbench\TestCase
{
    protected $dummyTable;

    public function setUp()
    {
        parent::setUp();

        $this->dummyTable = new DummyTable();
    }

    /**
     * Define environment setup.
     *
     * @param Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['router']->get('dummyTable', function () {
            return $this->dummyTable->render();
        });
    }

    /** @test */
    public function test_it_renders_table()
    {
        $response = $this->get('dummyTable');

        //$response->assertSee('id="'.$this->dummyTable->getHtmlId().'"');
    }
}

class DummyTable extends \Lykegenes\TableView\AbstractTableView
{
    public function build()
    {
        $this->addColumn('Column Title', 'test_property');
    }

    public function getApiUrl()
    {
        return '/dummyApi';
    }
}
