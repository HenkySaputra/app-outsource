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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('worker_id')->references('id')->on('workers');
            $table->enum('grade',['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3', 'D3', 'D2', 'D1'])->default('S1');
            $table->string('school_name');
            $table->string('year_start');
            $table->string('year_end');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education');
    }
};
