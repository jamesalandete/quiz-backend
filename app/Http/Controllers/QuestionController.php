<?php

namespace App\Http\Controllers;


use App\Models\Question;

class QuestionController extends BaseController
{
    public function __construct(Question $modelRepo)
    {
        parent::__construct($modelRepo);
    }

    public function index()
    {
        try {
            $items = (new Question)::with(['answers'])->get();
            return response()->json($items);
        } catch (\Exception $e) {
            return $this->respondError($e->getMessage());
        }
    }
}
