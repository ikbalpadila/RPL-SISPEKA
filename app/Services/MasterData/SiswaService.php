<?php

namespace App\Services\MasterData;

use App\Models\Siswa;

class SiswaService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store(array $data)
    {
        return Siswa::create($data);
    }
}
