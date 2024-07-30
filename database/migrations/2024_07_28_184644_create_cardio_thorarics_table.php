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
        Schema::create('cardio_thoraric', function (Blueprint $table) {
            $table->id();
            $table->string('ctu_number')->unique();
            $table->string('patient_id')->nullable();
            $table->foreignId('surgery_id')->constrained('surgery_types');
            $table->string('prefix')->nullable();
            $table->string('full_name');
            $table->string('gender')->nullable();
            $table->integer('age')->nullable();
            $table->string('contact_number_1');
            $table->string('contact_number_2');
            $table->string('district')->nullable();
            $table->longText('address')->nullable();
            $table->string('ef')->nullable();
            $table->longText('diagnosis')->nullable();
            $table->longText('comments')->nullable();
            $table->string('cts')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('cardio_thorarics');
    }
};
