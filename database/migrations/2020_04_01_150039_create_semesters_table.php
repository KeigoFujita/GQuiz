<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semesters', function (Blueprint $table) {
            $table->string('semester_code', 10)->primary();
            $table->string('start_year', 4);
            $table->string('end_year', 4);
            $table->enum('semester', ['1', '2']);
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['completed', 'ongoing'])->default('ongoing');
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
        Schema::dropIfExists('semesters');
    }
}