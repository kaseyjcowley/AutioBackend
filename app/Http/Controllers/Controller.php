<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController {

  public function __construct() {
    $this->beforeFilter(function () {
      Event::fire('clockwork.controller.start');
    });

    $this->afterFilter(function () {
      Event::fire('clockwork.controller.end');
    });
  }

}
