<?php

namespace SimplyCMS\Template\Twig\Extensions;

use Twig\Node\Node;

class PageNode extends Node
{
    public function __construct($lineno, $tag = 'page')
    {
        parent::__construct([], [], $lineno, $tag);
    }

    public function compile(\Twig\Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write("echo \$this->env->getExtension('SimplyCMS\Template\Twig\Extensions\TwigHelper')->pageFunction();\n");
    }
}
