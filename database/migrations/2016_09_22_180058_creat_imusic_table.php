<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatImusicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('imusic',function(Blueprint $table){
           $table->increments('id');//新建一列自增名字为id
            $table->string('singer_name');//新建一列string类型。
            $table->string('song_name');
            $table->integer('admin_id');
            $table->timestamps();
//            $table->timestamps('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('imusic');
    }
}
