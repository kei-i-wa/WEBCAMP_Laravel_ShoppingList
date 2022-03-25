<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompletedShoppingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completed_shopping_lists', function (Blueprint $table) {
            //自動増分は不要
            $table->unsignedInteger('id');
            $table->string('name',255)->comment('買うもの');
            $table->unsignedBigInteger('user_id')->comment('リストの所有者');
            $table->foreign('user_id')->references('id')->on('users');//外部きー制約
            $table->dateTime('created_at')->useCurrent()->comment('購入日時');
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();
            //$table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('completed_shopping_lists');
    }
}
