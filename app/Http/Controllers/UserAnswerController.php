<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Answer;
use App\Models\UserAnswer;
use App\Models\UserScore;
use Illuminate\Http\Request;

class UserAnswerController extends BaseController
{
    public function __construct(UserAnswer $modelRepo)
    {
        parent::__construct($modelRepo);
    }

    public function store(Request $request)
    {
        try {
            $model = new UserAnswer();

            $item = $model::where('user_id', $request->user_id)
                ->where('question_id', $request->question_id)
                ->first();

            if ($item) {
                $item->update($request->all());
                $guard = $item;
            } else {
                $guard = $model::create($request->all());
            }

            return response()->json($guard, 201);
        } catch (\Exception $e) {
            return $this->respondError($e->getMessage());
        }
    }

    public function score(Request $request)
    {
        try {
            $answerList = Answer::select('id', 'question_id', 'answer_text', 'correct')->where('correct', true)->get();

            // Obtener todas las respuestas del usuario
            $userAnswers = UserAnswer::join('answers', 'user_answers.answer_id', '=', 'answers.id')
            ->select('user_answers.*', 'answers.correct')
            ->where('user_answers.user_id', $request->user_id)
            ->where('answers.correct', true)
            ->get();

            // Contar las respuestas correctas
            $correctAnswersCount = $userAnswers->count();

            // Calcular el puntaje en base a las respuestas correctas
            $totalAnswersCount = count($answerList);
            $score = number_format(($correctAnswersCount / $totalAnswersCount) * 100, 2);

            $data = [
                'user_id' => $request->user_id,
                'score' => $score
            ];
            $save = UserScore::create($data);

            return response()->json(['user' => $totalAnswersCount,'score' => $score, 'answerCorrect' => $answerList]);
        } catch (\Exception $e) {
            return $this->respondError($e->getMessage());
        }
    }

    public function scoreUser($user_id)
    {
        try {
        $item = UserScore::where('user_id', $user_id);
        return response()->json($item);
        } catch (\Exception $e) {
        return $this->respondError($e->getMessage());
        }
    }
}
