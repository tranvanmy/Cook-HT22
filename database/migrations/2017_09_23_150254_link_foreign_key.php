<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LinkForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('follows', function ($table) {
            $table->foreign('follower_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('following_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('rates', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('social_accounts', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('orders', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('order_details', function ($table) {
            $table->foreign('order_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('receipt_id')->references('id')->on('receipts')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('comments', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('receipt_id')->references('id')->on('receipts')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('user_receipts', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('receipt_id')->references('id')->on('receipts')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('user_receipt_steps', function ($table) {
            $table->foreign('user_receipt_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        Schema::table('ingredients', function ($table) {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        Schema::table('user_receipt_ingredients', function ($table) {
            $table->foreign('user_receipt_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('receipts', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        

        Schema::table('receipt_ingredients', function ($table) {
            $table->foreign('receipt_id')->references('id')->on('receipts')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('receipt_foodies', function ($table) {
            $table->foreign('receipt_id')->references('id')->on('receipts')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('foody_id')->references('id')->on('foodies')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('receipt_steps', function ($table) {
            $table->foreign('receipt_id')->references('id')->on('receipts')->onDelete('CASCADE')->onUpdate('CASCADE');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingredients', function (Blueprint $table) {
            $table->dropForeign('category_id');
            $table->dropColumn('category_id');
        });
    } 
}
