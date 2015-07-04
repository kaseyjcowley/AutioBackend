<?php namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response as SymResponse;

use Illuminate\Support\Facades\Route;

class BaseApiController extends Controller {

	/**
	 * @var int
	 */
	protected $statusCode = SymResponse::HTTP_OK;

	/**
	 * @var string
	 */
	protected $showResourceRoute;

	function __construct()
	{
		// Retrieves all routes
		$routes = Route::getRoutes();
		// Retrieves the 'CurrentController@show' string in order to find the name associated with the show action
		$resourceShowAction = sprintf("%s@show", get_class($this));

		// Get the show route name from the action
		$this->showResourceRoute = $routes->getByAction($resourceShowAction)->getName();
	}

	/**
	 * @return mixed
	 */
	public function getStatusCode()
	{
		return $this->statusCode;
	}

	/**
	 * @param mixed $statusCode
	 * @return $this
	 */
	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;

		return $this;
	}

	/**
	 * Gets the show resource url to return in the Location header. Used to retrieve a newly created resource.
	 *
	 * @param  int $resourceId - The id of the newly created resource
	 * @return string
	 */
	public function getResourcePath($resourceId)
	{
		return route($this->showResourceRoute, $resourceId);
	}

	/**
	 * @param array $data
	 * @return mixed
	 */
	public function respondOk(array $data)
	{
		return $this->respond($data);
	}

	/**
	 * Responds with a 201 Created for newly created resource
	 *
	 * Includes Location for accessing resource
	 *
	 * @param  int $resourceId - The id of the newly created resource
	 * @return mixed
	 */
	public function respondCreated($resourceId)
	{
		$href = $this->getResourcePath($resourceId);

		$data = ['href' => $href];
		$headers = ['Location' => $href];

		return $this->setStatusCode(SymResponse::HTTP_CREATED)->respond($data, $headers);
	}

	/**
	 * Responds with 400 Bad Request for malformed/unvalidated user input
	 * @param  string $message - The error message
	 * @param  [type] $errors  - The errors
	 * @return mixed
	 */
	public function respondBadRequest($message = 'Bad request', $errors = [])
	{
		return $this->setStatusCode(SymResponse::HTTP_BAD_REQUEST)->respondWithError($message, $errors);
	}

	/**
	 * @param string $message
	 * @return mixed
	 */
	public function respondNotFound($message = 'Not found')
	{
		return $this->setStatusCode(SymResponse::HTTP_NOT_FOUND)->respondWithError($message);
	}

	/**
	 * @param string $message
	 * @return mixed
	 */
	public function respondInternalError($message = 'Internal error')
	{
		return $this->setStatusCode(SymResponse::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
	}

	/**
	 * @param $message
	 * @param $errors
	 * @return mixed
	 */
	public function respondWithError($message, $errors = [])
	{
		return $this->respond([
			'error' => [
				'message' => $message,
				'status_code' => $this->getStatusCode(),
				'errors' => $errors
			]
		]);
	}

	/**
	 * @param $data
	 * @param array $headers
	 * @return mixed
	 */
	public function respond($data = [], $headers = [])
	{
		return response()->json($data, $this->getStatusCode(), $headers);
	}

}
