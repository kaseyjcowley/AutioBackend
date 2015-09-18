<?php
namespace Autio\Repositories;

use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Autio\Interfaces\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
  /** 
   * @var Illuminate\Container\Container
   */
  private $app;

  /**
   * @var string
   */
  protected $model;

  /**
   * @var Illuminate\Database\Eloquent\Model
   */
  protected $model_instance;

  /**
   * @var array
   */
  protected $with;

  /**
   * @param Illuminate\Container\Container $app
   */
  public function __construct(App $app)
  {
    $this->app = $app;
    $this->makeModel();
  }

  /**
   * Define relationships to eager load
   * @param  array $relations
   * @return $this
   */
  public function with(...$relations)
  {
    $this->with = $relations;
    return $this;
  }

  /**
   * Get all model records
   * @param  array $columns
   * @return mixed
   */
  public function all($columns = ['*'])
  {
    if (is_null($this->with))
      return $this->model_instance->all($columns);

    return $this->model_instance
      ->with($this->with)
      ->get($columns);
  }

  /**
   * Get paginated records
   * @param  integer $per_page
   * @param  array $columns
   * @return mixed
   */
  public function paginate($per_page = 10, $columns = ['*'])
  {
    return $this->model_instance->paginate($per_page, $columns);
  }

  /**
   * Create a record
   * @param  array $data
   * @return mixed
   */
  public function create(array $data)
  {
    return $this->model_instance->create($data);
  }

  /**
   * Update a record
   * @param  integer $id
   * @param  array $data
   * @return mixed
   */
  public function update($id, array $data)
  {
    return $this->model_instance
      ->find($id)
      ->update($data);
  }

  /**
   * Delete a record
   * @param  integer $id
   * @return mixed
   */
  public function delete($id)
  {
    return $this->model_instance->destroy($id);
  }

  /**
   * Find a record
   * @param  integer $id
   * @param  array $columns
   * @return mixed
   */
  public function find($id, $columns = ['*'])
  {
    return $this->model_instance->find($id, $columns);
  }

  /**
   * Find a record by
   * @param  mixed $attribute
   * @param  mixed $value
   * @param  array $columns
   * @return mixed
   */
  public function findBy($attribute, $value, $columns = ['*'])
  {
    return $this->model_instance
      ->where($attribute, '=', $value)
      ->get($columns);
  }

  /**
   * Creates a model from a string
   * @return Illuminate\Database\Eloquent\Model
   */
  protected function makeModel()
  {
    $model = $this->app->make($this->model);

    if (!$model instanceof BaseModel)
      throw new Exception('Replace this with a new exception');

    return $this->model_instance = $model;
  }

}