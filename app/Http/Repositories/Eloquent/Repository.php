<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;

abstract class Repository implements RepositoryInterface
{
    protected $model;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    abstract public function model();

    public function makeModel()
    {
        return $this->setModel($this->model());
    }

    public function setModel($eloquentModel)
    {
        $this->newModel = $this->app->make($eloquentModel);
        if (!$this->newModel instanceof Model)
            throw new RepositoryException("Class {$this->newModel} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        
        return $this->model = $this->newModel;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function paginate($perPage = 25, $columns = array('*'))
    {
        return $this->model->paginate($perPage, $columns);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findBy($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    public function findAllBy($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->get($columns);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id, $attribute = "id")
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
