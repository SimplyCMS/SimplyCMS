<?php


namespace SimplyCMS\Template\Twig\Extensions;


use Twig\Node\Node;

class ContentNode extends Node
{
    public function __construct($name, \Twig\Node\Expression\AbstractExpression $value, $line, $tag = null)
    {
        parent::__construct(['value' => $value], ['name' => $name], $line, $tag);
    }

    public function compile(\Twig\Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write("echo \$this->env->getExtension('SimplyCMS\Template\Twig\Extensions\TwigHelper')->hello();")
            ->write('$context[\''.$this->getAttribute('name').'\'] = ')
            ->subcompile($this->getNode('value'))
            ->raw(";\n")
        ;
    }
}
