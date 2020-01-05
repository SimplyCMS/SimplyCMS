<?php

namespace Backend\Classes;

/**
 * Class BackendController
 *
 * @package Backend\Classes
 */
class BackendController
{
    public function handle($uri = null)
    {
        if (is_null($uri)) {
            echo 'null';
        } else {
            echo $uri;
        }
    }

    public function bootTwig()
    {

    }
}
