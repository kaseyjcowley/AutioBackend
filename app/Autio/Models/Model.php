<?php
namespace Autio\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{

  protected $fillable = ['make_id', 'name'];

  /**
   * @return mixed
   */
  public function make()
  {
    return $this->belongsTo(Make::class);
  }

  public function vehicle()
  {
    return $this->hasOne(Vehicle::class);
  }

}
