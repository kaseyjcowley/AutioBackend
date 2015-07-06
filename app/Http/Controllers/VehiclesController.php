<?php
namespace App\Http\Controllers;

use Autio\Transformers\VehicleTransformer;
use Autio\Validators\VehicleValidator;
use Autio\Repositories\VehicleRepository;
use Autio\Exceptions\ValidationException;
use Autio\Models\Vehicle;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class VehiclesController extends BaseApiController
{

  /**
   * Display a listing of the resource.
   * GET /vehicle
   *
   * @return Response
   */
  public function index(VehicleTransformer $transformer)
  {
    $vehicles = Vehicle::with('model.make')->get();
    return $this->respondOk([
      'vehicles' => $transformer->transformCollection($vehicles)
    ]);
  }

  /**
   * Show the form for creating a new resource.
   * GET /vehicle/create
   *
   * @return Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   * POST /vehicle
   *
   * @return Response
   */
  public function store(VehicleValidator $validator, VehicleRepository $repository)
  {
    try {
      $validator->validate(Input::all());
    } catch (ValidationException $e) {
      return $this->respondBadRequest($e->getMessage(), $e->getErrors());
    }

    $newVehicleId = $repository->create(Input::all());

    return $this->respondCreated($newVehicleId);
  }

  /**
   * Display the specified resource.
   * GET /vehicle/{id}
   *
   * @param  int  $id
   * @return Response
   */
  public function show(VehicleTransformer $transformer, $id)
  {
    try {
      $vehicle = Vehicle::findOrFail($id);
    } catch (ModelNotFoundException $e) {
      return $this->respondNotFound('Vehicle does not exist');
    }

    return $this->respondOk([
      'vehicle' => $transformer->transform($vehicle)
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   * GET /vehicle/{id}/edit
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
   * PUT /vehicle/{id}
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   * DELETE /vehicle/{id}
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    //
  }

}
