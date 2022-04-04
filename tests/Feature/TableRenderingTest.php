<?php

class TableRenderingTest extends Orchestra\Testbench\TestCase
{
    protected $dummyTable;

    public function setUp(): void
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
        $app['config']->set('tableview.default-table-view', 'tableview::tableview');
        $app['router']->get('dummyTable', function () {
            return $this->dummyTable->render();
        });
    }

    /** @test */
    public function test_it_renders_table()
    {
        //$response = $this->get('dummyTable');

        //$response->assertSee('id="'.$this->dummyTable->getHtmlId().'"');
        
        $this->assertStringContainsString('id="'.$this->dummyTable->getHtmlId().'"', $this->dummyTable->render());
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
