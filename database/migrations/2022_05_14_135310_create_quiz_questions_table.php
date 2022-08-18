<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->foreignId('category_id')->constrained();
=======
            $table->foreignId('quiz_id')->constrained();
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
            $table->text('description');
            $table->string('image');
            $table->string('fr');
            $table->string('ar');
            $table->string('ng');
<<<<<<< HEAD
            $table->boolean('correct');
=======
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_questions');
    }
};
