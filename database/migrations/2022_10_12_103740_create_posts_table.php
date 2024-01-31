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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('jobtype', ['freelance', 'contract', 'outsource'])->default('freelance');
            $table->integer('accepted_number')->nullable();
            $table->longText('description')->nullable();
            $table->integer('salary_min')->default(0);
            $table->integer('salary_max')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_skill')->default(false);
            $table->integer('work_month')->default(0);
            $table->boolean('is_worker_new')->default(false);
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
        Schema::dropIfExists('posts');
    }
};
