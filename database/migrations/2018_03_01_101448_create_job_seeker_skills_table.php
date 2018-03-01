<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobSeekerSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_seeker_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_seeker_id')->unsigned()->nullable()->index();
            $table->string('title', 200);
            $table->timestamps();

            $table->foreign('job_seeker_id')->references('id')->on('job_seekers')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_seeker_skills');
    }
}
