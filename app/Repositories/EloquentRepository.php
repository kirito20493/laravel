<?php
namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class EloquentRepository implements RepositoryInterface
{
    /**
     * Declare model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * EloquentRepository constructor init. 
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * Get the corresponding model
     * 
     * @return string
     */
    abstract public function getModel();

    /**
     * Set the corresponding model
     * 
     * @return void
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get All
     * 
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {

        return $this->model->all();
    }

    /**
     * Get one
     *
     * @param $id idmodel
     *
     * @return mixed
     */
    public function find($id)
    {
        $result = $this->model->find($id);

        return $result;
    }

    /**
     * Create
     *
     * @param array $attributes array
     *
     * @return mixed
     */
    public function create(array $data)
    {

        return $this->model->create($data);
    }

    /**
     * Update
     *
     * @param int   $id         idmodel
     * @param array $attributes array
     *
     * @return bool|mixed
     */
    public function update($id, array $data)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($data);
            return $result;
        }

        return false;
    }

    /**
     * Delete
     *
     * @param $id idmodel
     *
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
}
