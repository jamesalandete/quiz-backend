<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::create([
            'question_text' => '¿Cuales son una Base de Datos relacional?',
        ]);

        Question::create([
            'question_text' => '¿Qué significa CSS en diseño web?',
        ]);

        Question::create([
            'question_text' => '¿Cuál es la forma correcta de declarar una variable en JavaScript?',
        ]);

        Question::create([
            'question_text' => '¿Cuál es el elemento principal para crear encabezados en HTML?',
        ]);

        Question::create([
            'question_text' => '¿Cuál es la propiedad CSS que se utiliza para cambiar el color de fondo de un elemento?',
        ]);
    }
}
