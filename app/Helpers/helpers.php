<?php namespace App\Helpers;

use Illuminate\Support\Facades\Route;

class Helpers {

  /**
   * Helper function to return the "show" href of a resource
   * Useful for href data points in API responses
   *
   * @param  string $controller - The controller of the resource
   * @param  int $resource_id - ID of the resource
   * @return string
   */
  public static function get_resource_href($controller, $resource_id)
  {
    $resource_show_action = sprintf("%s@show", $controller);
    $resource_show_route_name = Route::getRoutes()->getByAction($resource_show_action)->getName();

    return route($resource_show_route_name, $resource_id);
  }

}
