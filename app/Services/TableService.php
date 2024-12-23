<?php

namespace App\Services;

use App\Models\Table;
use App\Repositories\TableRepository;

class TableService
{
    protected $tableRepository;

    public function __construct(TableRepository $tableRepository)
    {
        $this->tableRepository = $tableRepository;
    }

    public function getAllTables()
    {
        return $this->tableRepository->getAllTables();
    }

    public function createNewTable($data) : Table
    {
        return $this->tableRepository->createNewTable($data);
    }
}
