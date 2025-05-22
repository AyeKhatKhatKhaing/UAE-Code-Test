<?php

namespace App\Helpers;


class SidebarHelper
{
    public static function menuShow(array $routes)
    {
        echo self::isCurrentUrl($routes) ? 'here show'  : '';
    }

    public static function menuActive(array $routes)
    {
        echo self::isCurrentUrl($routes) ? 'active' : '';
    }

    public static function isCurrentUrl(array $routes): bool
    {
        foreach ($routes as $item) {
            if (request()->routeIs($item)) {
                return true;
            }
        }

        return false;
    }

}
