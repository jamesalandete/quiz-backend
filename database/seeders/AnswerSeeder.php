<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Answer;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Answer::create([
            'question_id' => 1,
            'answer_text' => 'MySql',
            'correct' => 1
        ]);

        Answer::create([
            'question_id' => 1,
            'answer_text' => 'MongoDB',
            'correct' => 0
        ]);

        Answer::create([
            'question_id' => 1,
            'answer_text' => 'FireBase',
            'correct' => 0
        ]);

        // Question - ¿Qué significa CSS en diseño web?
        Answer::create([
            'question_id' => 2,
            'answer_text' => 'Computer Server Side',
            'correct' => 0
        ]);

        Answer::create([
            'question_id' => 2,
            'answer_text' => 'Cascading Style Sheets',
            'correct' => 1
        ]);

        Answer::create([
            'question_id' => 2,
            'answer_text' => 'Creative Styling System',
            'correct' => 0
        ]);

        // Question - ¿Cuál es la forma correcta de declarar una variable en JavaScript?
        Answer::create([
            'question_id' => 3,
            'answer_text' => 'variable = 5;',
            'correct' => 0
        ]);

        Answer::create([
            'question_id' => 3,
            'answer_text' => 'var myVariable = 5;',
            'correct' => 1
        ]);

        Answer::create([
            'question_id' => 3,
            'answer_text' => 'let = myVariable;',
            'correct' => 0
        ]);

        // Question - ¿Cuál es el elemento principal para crear encabezados en HTML?
        Answer::create([
            'question_id' => 4,
            'answer_text' => '<heading>',
            'correct' => 0
        ]);

        Answer::create([
            'question_id' => 4,
            'answer_text' => '<header>',
            'correct' => 0
        ]);

        Answer::create([
            'question_id' => 4,
            'answer_text' => '<h1>',
            'correct' => 1
        ]);

        // Question - ¿Cuál es la propiedad CSS que se utiliza para cambiar el color de fondo de un elemento?
        Answer::create([
            'question_id' => 5,
            'answer_text' => 'background-color',
            'correct' => 1
        ]);

        Answer::create([
            'question_id' => 5,
            'answer_text' => 'color-background',
            'correct' => 0
        ]);

        Answer::create([
            'question_id' => 5,
            'answer_text' => 'bg-color',
            'correct' => 0
        ]);
    }
}
