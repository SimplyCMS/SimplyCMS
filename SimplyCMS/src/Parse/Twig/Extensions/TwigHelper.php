<?php


namespace SimplyCMS\Parse\Twig\Extensions;


use Frontend\Classes\FrontendController;
use System\Classes\Controller;
use Twig\Extension\AbstractExtension;
use Twig\Extension\ExtensionInterface;

class TwigHelper extends AbstractExtension implements ExtensionInterface
{
    protected Controller $controller;

    public function __construct(Controller $controller = null)
    {
     $this->controller = $controller;
    }

    public function pageFunction(){
        echo $this->controller->renderPage();
    }
}
