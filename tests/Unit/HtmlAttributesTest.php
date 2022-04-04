<?php

use Lykegenes\TableView\Helpers\HtmlAttributes;

class HtmlAttributesTest extends Orchestra\Testbench\TestCase
{
    /** @test */
    public function it_renders_strings()
    {
        $attribute = new HtmlAttributes();
        $attribute->set('testKey', 'testValue');

        $this->assertStringContainsString('testKey="testValue"', $attribute->render());
    }

    /** @test */
    public function it_renders_booleans()
    {
        $attribute = new HtmlAttributes();
        $attribute->set('testTrue', true);
        $attribute->set('testFalse', false);

        $this->assertStringContainsString('testTrue="true"', $attribute->render());
        $this->assertStringContainsString('testFalse="false"', $attribute->render());
    }

    /** @test */
    public function it_renders_numbers()
    {
        $attribute = new HtmlAttributes();
        $attribute->set('testKey', 42);

        $this->assertStringContainsString('testKey="42"', $attribute->render());
    }

    /** @test */
    public function it_renders_names_only()
    {
        $attribute = new HtmlAttributes();
        $attribute->set('testKey');

        $this->assertStringContainsString('testKey', $attribute->render());
    }
}
