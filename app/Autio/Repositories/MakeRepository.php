<?php namespace Autio\Repositories;

use Autio\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Autio\Models\Make;

class MakeRepository implements RepositoryInterface {

    /**
     * @return mixed
     */
    public function getAll()
    {
        return Make::all();
    }

    public function get($id)
    {
        return Make::findOrFail($id);
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

}
