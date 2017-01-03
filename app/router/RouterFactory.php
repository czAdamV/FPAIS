<?php

namespace FPAIS;

use Nette;
use Nette\Application\Routers\RouteList;
use Nette\Application\Routers\Route;

class RouterFactory {

    use Nette\StaticClass;

    /**
     * @return Nette\Application\IRouter
     */
    public static function createRouter() {
        $router = new RouteList;
        // pretty url route
        $router[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
        // uncomment next line for simple url (nginx, apache witout mod_rewrite )
        //$router[] = new \Nette\Application\Routers\SimpleRouter('Homepage:default');
        return $router;
    }

}
