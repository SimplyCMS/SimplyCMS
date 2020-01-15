<?php


namespace System\Classes;


abstract class Controller
{
    public function __construct(Router $route)
    {

    }

    /**
     * Boot any twig extensions for the route
     *
     * @return void
     */
    private function bootTwig()
    {

    }
}
