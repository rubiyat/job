<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_category_id')->unsigned()->nullable()->index();

            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->float('payment_amount', 8, 2)->unsigned();
            $table->dateTime('working_date_time');
            $table->integer('required_employee')->unsigned();
           
            $table->boolean('is_active')->default(1);
            $table->timestamps();

            $table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_posts');
    }
}
