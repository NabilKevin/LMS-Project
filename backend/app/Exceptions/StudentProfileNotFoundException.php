<?php

namespace App\Exceptions;

use Exception;

class StudentProfileNotFoundException extends Exception
{
    public function __construct(int $userId)
    {
        parent::__construct("Student profile not found for user #{$userId}");
    }

    public function render()
    {
        return response()->json(['message' => $this->getMessage()], 404);
    }
}
