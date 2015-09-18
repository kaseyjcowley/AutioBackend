<?php
namespace Autio\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Autio\Models\Make;

class MakeRepository extends BaseRepository
{
  protected $model = Make::class;
}
