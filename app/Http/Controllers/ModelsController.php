<?php
namespace App\Http\Controllers;

use Autio\Repositories\ModelRepository;
use Autio\Transformers\ModelTransformer;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class ModelsController extends BaseApiController
{

  /**
   * @var Autio\Transformers\ModelTransformer
   */
  protected $modelTransformer;

  /**
   * @var ModelRepository
   */
  private $modelRepository;

  /**
   * @param ModelRepository $modelRepository
   * @param ModelTransformer $modelTransformer
   */
  function __construct(ModelRepository $modelRepository, ModelTransformer $modelTransformer)
  {
    $this->modelTransformer = $modelTransformer;
    $this->modelRepository = $modelRepository;
  }

  /**
   * Display a listing of the resource.
   * GET /models
   *
   * @return Response
   */
  public function index()
  {
    $models = $this->modelRepository->getAll();
    return $this->respondOk([
      'models' => $this->modelTransformer->transformCollection($models)
    ]);
  }

  /**
   * Show the form for creating a new resource.
   * GET /models/create
   *
   * @return Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   * POST /models
   *
   * @return Response
   */
  public function store()
  {
    //
  }

  /**
   * Display the specified resource.
   * GET /models/{id}
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    try {
      $model = Model::findOrFail($id);
    } catch (ModelNotFoundException $e) {
      return $this->respondNotFound('Model does not exist');
    }

    return $this->respondOk([
      'model' => $this->modelTransformer->transform($model)
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   * GET /models/{id}/edit
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   * PUT /models/{id}
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    //
  }

}
