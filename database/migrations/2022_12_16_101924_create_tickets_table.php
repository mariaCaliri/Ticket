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
            $table->timestamp('registered_at')->useCurrent();
            $table->date('end_date')->nullable();
            $table->string('status')->default('in lavorazione');
            $table->string('priority')->default('mediamente urgente');
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
