<?php
/**
 * Created by PhpStorm.
 * User: aigie
 * Date: 11/03/2017
 * Time: 14:09
 */

namespace Aigie\SitemapGeneratorBundle\Services;


use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\RouterInterface;

class SitemapGenerator
{
    private $router;
    private $em;
    private $request;

    public function __construct(RouterInterface $router, EntityManager $em, RequestStack $request)
    {
        $this->router = $router;
        $this->em = $em;
        $this->request = $request->getCurrentRequest();
    }

    public function generate(array $controllers)
    {
        $hostname = $this->request->getHost();
        $urls = [];

        $routes = $this->getRoutes($controllers);

        foreach ($routes as $route) {
            array_push($urls, array(
                'loc' => $this->router->generate($route),
            ));
        }

        return array(
            'hostname' => $hostname,
            'urls' => $urls
        );
    }

    private function getRoutes(array $controllers)
    {
        $routes = array();

        foreach ($controllers as $controller) {
            foreach ($this->router->getRouteCollection()->all() as $name => $route) {
                if(array_key_exists('_controller', $route->getDefaults())) {
                    $routeController = $route->getDefaults()['_controller'];
                    if(false !== strpos($routeController, $controller)) array_push($routes, $name);
                }
            }
        }

        return $routes;
    }
}
