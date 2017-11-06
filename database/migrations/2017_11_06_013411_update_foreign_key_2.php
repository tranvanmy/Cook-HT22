<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateForeignKey2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_receipt_steps', function ($table) {
            $table->dropForeign(["user_receipt_id"]);
            $table->foreign('user_receipt_id')->references('id')->on('user_receipts')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        Schema::table('user_receipt_ingredients', function ($table) {
            $table->dropForeign(["user_receipt_id"]);
            $table->foreign('user_receipt_id')->references('id')->on('user_receipts')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        Schema::table('user_receipt_foodies', function ($table) {
            $table->foreign('user_receipt_id')->references('id')->on('user_receipts')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_receipt_steps', function ($table) {
            $table->dropForeign(["user_receipt_id"]);
        });
        Schema::table('user_receipt_ingredients', function ($table) {
            $table->dropForeign(["user_receipt_id"]);
        });
        Schema::table('user_receipt_foodies', function ($table) {
            $table->dropForeign(["user_receipt_id"]);
        });
    }
}
