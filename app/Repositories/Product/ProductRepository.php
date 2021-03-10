<?php

namespace App\Repositories\Product;

use App\Repositories\EloquentRepository;
use App\Models\Product;
use App\Models\Catagory;
use DB;

class ProductRepository extends EloquentRepository implements ProductRepositoryInterface
{   
    public function getModel()
    {
        return Product::class;
    }
    /**
     * Get all
     * @return mixed
     */

    public function getAllProduct()
    {
        $products = DB::table('products')
        ->join('catagories','products.catalogID','=','catagories.id')
        ->select('products.*','catagories.name as catalogname')
        ->paginate(5);
        return $products;
    }

    public function getAll()
    {
        return $product = $this->model->all();
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $product = $this->model->findOrFail($id);
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
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
        return $this->model->destroy($id);
    }
}