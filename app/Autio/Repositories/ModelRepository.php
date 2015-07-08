<?php
namespace Autio\Repositories;

use Autio\Interfaces\RepositoryInterface;
use Autio\Models\Model;

class ModelRepository implements RepositoryInterface
{

    public function getAll()
    {
        return Model::all();
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
