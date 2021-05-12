<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentClearancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_clearances', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('department_requirement_id');
            $table->enum('status', ['complete', 'incomplete'])->default('incomplete');
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
        Schema::dropIfExists('department_clearances');
    }
}