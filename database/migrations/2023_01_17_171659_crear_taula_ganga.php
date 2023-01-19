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
    public function up() {
        Schema::create('gangas', function(BluePrint $tabla) {
            $tabla->id()->autoIncrement();
            $tabla->string('title');
            $tabla->text('description');
            $tabla->text('url');
            $tabla->bigInteger('category')->unsigned()->nullable();
            $tabla->bigInteger('likes')->unsigned();
            $tabla->bigInteger('dislikes')->unsigned();
            $tabla->bigInteger('price')->unsigned();
            $tabla->bigInteger('price_sale')->unsigned();
            $tabla->boolean('available');
            $tabla->bigInteger('user_id')->unsigned()->nullable();
            $tabla->string('image');
            $tabla->timestamps();
            $tabla->foreign('category')->references('id')->on('categorias');
            $tabla->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('ganga', function (Blueprint $table) {
            Schema::drop('ganga');
            $table->dropForeign('gangas_usuari_id_foreign');
            $table->dropForeign('categories_category_foreign');
        });
    }
};
