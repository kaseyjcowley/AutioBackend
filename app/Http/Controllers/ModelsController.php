<?php
namespace App\Http\Controllers;

use Autio\Repositories\ModelRepository;
use Autio\Transformers\ModelTransformer;
use Autio\Models\Model;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class ModelsController extends BaseApiController
{

  /**
   * Display a listing of the resource.
   * GET /makes/{id}/models
   *
   * @return Response
   */
  public function index(ModelRepository $repo, ModelTransformer $transformer, $makeId)
  {
    try {
      $models = $repo->findBy('make_id', $makeId);
    } catch (ModelNotFoundException $e) {
      return $this->respondNotFound('Make does not exist');
    }

    return $this->respondOk([
      'models' => $transformer->transformCollection($models)
    ]);
  }

}
