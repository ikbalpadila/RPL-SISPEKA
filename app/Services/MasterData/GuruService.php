<?php

namespace App\Services\MasterData;

use App\Models\Guru;

class GuruService
{
    /**
     * Create a new class instance.
     */
    public function store(array $data)
    {
        return Guru::create($data);
    }
 
    public function update(Guru $guru, array $data)
    {
        return $guru->update($data);
    }

    public function delete(Guru $guru)
    {
        return $guru->delete();
    }

    public function __construct()
    {
        //
    }
}