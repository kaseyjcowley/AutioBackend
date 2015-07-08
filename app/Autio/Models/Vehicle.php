<?php
namespace Autio\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Vehicle extends BaseModel
{

  /**
   * @var array
   */
  protected $fillable = ['year', 'model_id', 'mileage'];

  /**
   * @return mixed
     */
  public function make()
  {
    return $this->hasOne('Autio\Models\Make', 'id', 'make_id');
  }

  /**
   * @return mixed
     */
  public function model()
  {
    return $this->hasOne('Autio\Models\Model', 'id', 'model_id');
  }

}
