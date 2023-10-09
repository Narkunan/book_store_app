<?php

class Routes {

  protected array $routes = [];
 
  public function addRoute(Route $route): void {
    $this->routes[$route->url] = $route;
  }

  public function getRoutes(): array {
    return $this->routes;
  }

}