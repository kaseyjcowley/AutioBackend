<?php
namespace App\Http\Controllers;

use Autio\Repositories\MakeRepository;
use Autio\Transformers\MakeTransformer;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class MakesController extends BaseApiController
{

  /**
   * @var Autio\Transformers\MakeTransformer
   */
  protected $makeTransformer;

  /**
   * @var MakeRepository
   */
  protected $makeRepository;

  /**
   * @param MakeRepository $makeRepository
   * @param MakeTransformer $makeTransformer
   */
  function __construct(MakeRepository $makeRepository, MakeTransformer $makeTransformer)
  {
    $this->makeTransformer = $makeTransformer;
    $this->makeRepository = $makeRepository;
  }

  /**
   * Display a listing of the resource.
   * GET /makes
   *
   * @return Response
   */
  public function index()
  {
    $makes = $this->makeRepository->getAll();
    return $this->respondOk([
      'makes' => $this->makeTransformer->transformCollection($makes)
    ]);
  }

  /**
   * Display the specified resource.
   * GET /makes/{id}
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    try {
      $make = $this->makeRepository->get($id);
    } catch (ModelNotFoundException $e) {
      return $this->respondNotFound('Make does not exist');
    }

    return $this->respondOk([
      'make' => $this->makeTransformer->transform($make)
    ]);
  }

}
