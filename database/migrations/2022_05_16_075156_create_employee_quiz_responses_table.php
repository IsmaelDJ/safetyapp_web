<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_quiz_responses', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->foreignId('quiz_question_id')->constrained()->cascadeOnDelete();
            $table->boolean('correct');
=======
            $table->foreignId('employee_id')->constrained();
            $table->foreignId('quiz_response_id')->constrained();
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
<<<<<<< HEAD
    public function down() 
=======
    public function down()
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
    {
        Schema::dropIfExists('employee_quiz_responses');
    }
};
