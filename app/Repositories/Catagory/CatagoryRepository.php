<?php

namespace App\Repositories\Catagory;

use App\Repositories\EloquentRepository;
use App\Models\Catagory;

class CatagoryRepository extends EloquentRepository implements CatagoryRepositoryInterface
{
    public function getModel()
    {
        return Catagory::class;
    }
    /**
     * Get all
     * @return mixed
     */
    public function getCatagory()
    {

    }
    
    public function getAll()
    {
        return $catagory = $this->model->all();
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $catagory = $this->model->findOrFail($id);
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $data)
    {

    }

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $data)
    {

    }

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $catagory = $this->model->destroy($id);
    }
}