<?php
namespace Autio\Repositories;

use Autio\Interfaces\RepositoryInterface;
use Autio\Models\Model;
use Autio\Models\Make;

class ModelRepository implements RepositoryInterface
{

    public function getAll()
    {
    }

    /**
     * Get all models by make id
     * 
     * @param  int $makeId
     * @throws Illuminate\Database\Eloquent\ModelNotFoundException
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getByMakeId($makeId)
    {
      return Make::findOrFail($makeId)->models;
    }

    public function get($id)
    {
        return Model::findOrFail($id);
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }
}
