<?php
namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * Get all
     * 
     * @return mixed
     */
    public function getAll();

    /**
     * Get one
     *
     * @param int $id id_model
     *
     * @return mixed
     */
    public function find($id);

    /**
     * Create
     *
     * @param array $attributes attribute
     *
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update
     *
     * @param int   $id         id_model
     * @param array $attributes array_attribute
     *
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * Delete
     *
     * @param int $id id_model
     *
     * @return mixed
     */
    public function delete($id);

}
