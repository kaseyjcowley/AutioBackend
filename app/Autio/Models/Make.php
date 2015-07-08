<?php
namespace Autio\Models;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{

  protected $fillable = ['name'];

  /**
   * @return mixed
   */
  public function model()
  {
    return $this->belongsTo('Model');
  }

  /**
   * @return mixed
   */
  public function vehicle()
  {
    return $this->belongsToMany('Vehicle');
  }

}
