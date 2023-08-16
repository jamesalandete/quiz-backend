<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Http\Controllers\BaseController;

class AnswerController extends BaseController
{
    public function __construct(Answer $modelRepo)
    {
        parent::__construct($modelRepo);
    }
}
