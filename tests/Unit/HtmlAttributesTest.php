<?php

use Lykegenes\TableView\Helpers\HtmlAttributes;

class HtmlAttributesTest extends Orchestra\Testbench\TestCase
{
    /** @test */
    public function it_renders_strings()
    {
        $attribute = new HtmlAttributes();
        $attribute->set('testKey', 'testValue');

        $this->assertContains('testKey="testValue"', $attribute->render());
    }

    /** @test */
    public function it_renders_booleans()
    {
        $attribute = new HtmlAttributes();
        $attribute->set('testTrue', true);
        $attribute->set('testFalse', false);

        $this->assertContains('testTrue="true"', $attribute->render());
        $this->assertContains('testFalse="false"', $attribute->render());
    }

    /** @test */
    public function it_renders_numbers()
    {
        $attribute = new HtmlAttributes();
        $attribute->set('testKey', 42);

        $this->assertContains('testKey="42"', $attribute->render());
    }

    /** @test */
    public function it_renders_names_only()
    {
        $attribute = new HtmlAttributes();
        $attribute->set('testKey');

        $this->assertContains('testKey', $attribute->render());
    }
}
