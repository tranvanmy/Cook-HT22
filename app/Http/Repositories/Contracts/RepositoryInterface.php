<?php 
namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    public function all();

    public function paginate($perPage = 1, $columns = array('*'));

    public function find($id);

    public function findBy($attribute, $value, $columns = array('*'));

    public function findAllBy($attribute, $value, $columns = array('*'));

    public function create(array $data);

    public function update(array $data, $id, $attribute = "id");

    public function delete($id);
}
