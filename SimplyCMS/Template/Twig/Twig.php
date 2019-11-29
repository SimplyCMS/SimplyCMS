<?php

namespace SimplyCMS\Template\Twig;

class Twig
{
    const TWIG_MACRO = 0;
    const TWIG_GLOBAL = 1;
    const TWIG_FUNCTION = 2;
    const TWIG_FILTER = 3;
    const TWIG_TAG = 4;
    const TWIG_TEST = 5;
    const TWIG_OPERATOR = 6;

    private $twig_environment;
    private $twig_loader;

    /**
     * Twig constructor.
     */
    public function __construct()
    {
    }

    public function getLoader()
    {
    }

    public function getEnvironment()
    {
    }

    public function loadExtension(int $type)
    {
        switch ($type) {
            case self::TWIG_MACRO:
                break;
            case self::TWIG_GLOBAL:
                break;
            case self::TWIG_FUNCTION:
                break;
            case self::TWIG_FILTER:
                break;
            case self::TWIG_TAG:
                break;
            case self::TWIG_TEST:
                break;
            case self::TWIG_OPERATOR:
                break;
            default:
                break;
        }
    }
}
