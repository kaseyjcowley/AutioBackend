<?php
namespace Autio\Repositories;

use Autio\Models\Vehicle;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VehicleRepository extends BaseRepository
{
  protected $model = Vehicle::class;
}
