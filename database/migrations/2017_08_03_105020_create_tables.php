<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_lists',function(Blueprint $table)
        {
                $table->increments('id');
                $table->text('name');
                $table->date('date_dead');
                $table->tinyInteger('status');
                $table->timestamps();
        });
       /* Schema::table('task_lists',function(Blueprint $table)
        {
            $table->string('name', 1000)->change();
        });*/

        /*Schema::table('task_lists', function (Blueprint $table) {
            $table->dropUnique('task_lists_name_unique');
        });*/



        Schema::create('comments',function(Blueprint $table)
        {
                $table->increments('id');
                $table->integer('task_id')->unsigned();
                $table->foreign('task_id')->references('id')->on('task_lists')->onDelete('cascade');
                $table->text('comment');
                $table->string('author');
                $table->date('date_comment');
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
        Schema::drop('comments');
        Schema::drop('task_lists');

    }
}
