<?php namespace Autio\Interfaces;

interface RepositoryInterface {

	public function getAll();
	public function get($id);
	public function create(array $data);

}