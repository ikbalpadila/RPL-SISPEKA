<?php

namespace App\Services\Behavior;

use App\Models\BehaviorNote;

class BehaviorService
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
            return BehaviorNote::create($data);
        }

}
