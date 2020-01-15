<?php

namespace SimplyCMS\Parse\Twig\Extensions;

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
            ->write("echo \$this->env->getExtension('" . TwigHelper::class . "')->pageFunction();\n");
    }
}
