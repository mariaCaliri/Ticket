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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('message')->nullable();
            $table->string('identification_code', 10)->unique();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->enum('status',['1', '2', '3']);
            $table->enum('priority', ['1', '2', '3']);
            $table->text('feedback')->nullable();

            $table->foreignId('category_id')->index()->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->index()->constrained()->cascadeOnDelete();
            $table->foreignId('operator_id')->index()->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('tickets');
    }
};
