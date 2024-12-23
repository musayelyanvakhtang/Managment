<?php

namespace App\Repositories;

use App\Models\Table;

class TableRepository
{
    public function getAllTables()
    {
        app()->singleton();
        return Table::all();
    }


    public function createNewTable($data): Table
    {
        return Table::create($data);
    }

}
