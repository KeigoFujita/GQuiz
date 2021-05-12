<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('lrn', 12);
            $table->integer('section_id')->nullable();
            $table->integer('strand_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('first_name', 100);
            $table->string('middle_name', 100);
            $table->string('last_name', 100);
            $table->enum('gender', ['male', 'female']);
            $table->enum('grade_level', ['11', '12']);
            // $table->string('mobile_number', 11);
            // $table->string('house_bldg_blk_lot_number', 50);
            // $table->string('street_name', 50);
            // $table->string('barangay_district', 50);
            // $table->string('city_municipality', 50);
            // $table->string('province', 50);
            // $table->string('guardian_first_name', 50);
            // $table->string('guardian_middle_name', 50);
            // $table->string('guardian_last_name', 50);
            // $table->string('guardian_relationship', 50);
            // $table->int('guardian_mobile_number', 11);
            $table->enum('status', ['active', 'dropped', 'transferred', 'graduated'])->default('active');
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
        Schema::dropIfExists('students');
    }
}