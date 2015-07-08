<?php
namespace Autio\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Make extends BaseModel
{

  protected $fillable = ['name'];

  /**
   * @return mixed
   */
  public function model()
  {
    return $this->belongsTo('Autio\Models\Model');
  }

  /**
   * @return mixed
   */
  public function models()
  {
    return $this->hasMany('Autio\Models\Model');
  }

  /**
   * @return mixed
   */
  public function vehicle()
  {
    return $this->belongsToMany('Autio\Models\Vehicle');
  }

}
