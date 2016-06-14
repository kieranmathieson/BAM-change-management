<?php
namespace Drupal\sheep\Routing;
use Symfony\Component\Routing\Route;
class CustomRoutes {
    public function routes() {
        $routes = [];
// Create mypage route programmatically
        $routes['sheep.evilsheep.page'] = new Route(
// Path definition
            'evilsheep',
// Route defaults
            [
                '_controller' => '\Drupal\sheep\Controller\SheepController::evilSheep',
                '_title' => 'Evil Sheep',
            ],
// Route requirements
            [
                '_permission' => 'access content',
            ]
        );
        return $routes;
    }
}