<?php
namespace Autio\Interfaces;

interface RepositoryInterface {
  public function with(...$relations);
  public function all($columns = ['*']);
  public function paginate($per_page = 10, $columns = ['*']);
  public function find($id, $columns = ['*']);
  public function findBy($field, $value, $columns = ['*']);
  public function create(array $data);
  public function update($id, array $data);
  public function delete($id);
}