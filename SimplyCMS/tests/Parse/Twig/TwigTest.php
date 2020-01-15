<?php

namespace Tests\Parse\Twig;

use PHPUnit\Framework\TestCase;
use SimplyCMS\Parse\Twig\Twig;
use Twig\Environment;
use Twig\Loader\LoaderInterface;

class TwigTest extends TestCase
{
    private $twig;

    protected function setUp(): void
    {
        parent::setUp();

        //$this->twig = new Twig(__DIR__ . '/fixtures/test_theme');
    }

    /*public function test__construct()
    {

    }
    */

    /*public function testRender()
    {

    }*/

    /** @test */
    public function it_returns_twig_environment()
    {
        //$this->assertInstanceOf(Environment::class, $this->twig->getEnvironment());
    }

    /** @test */
    public function it_returns_twig_loader()
    {
        //$this->assertInstanceOf(LoaderInterface::class, $this->twig->getEnvironment());
    }

    /*public function testLoadDirectory()
    {

    }

    public function testLoadExtension()
    {

    }*/
}
