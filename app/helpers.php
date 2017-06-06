<?php

if (! function_exists('active')) {
    function active($route)
    {
        return \App\Helpers\Navigation::isActiveRoute($route);
    }
}
