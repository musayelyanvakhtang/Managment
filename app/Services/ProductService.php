<?php

namespace App\Services;
use App\Repositories\ProductRepository;
class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts()
    {
      return  $this->productRepository->getAllProducts();
    }

    public function createNewProduct($data)
    {
        $this->productRepository->createNewProduct($data);


    }
}
