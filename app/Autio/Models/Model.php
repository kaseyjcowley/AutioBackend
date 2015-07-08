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
    return $this->hasOne('Autio\Models\Make', 'id', 'make_id');
  }

  public function vehicle()
  {
    return $this->belongsTo('Autio\Models\Vehicle');
  }

}
