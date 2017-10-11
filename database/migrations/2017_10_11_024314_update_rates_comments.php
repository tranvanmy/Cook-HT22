<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRatesComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rates', function (Blueprint $table) {
            $table->integer("receipt_id")->unsigned();
            $table->string("content");
            $table->foreign('receipt_id')->references('id')->on('receipts')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(["receipt_id"]);
            $table->dropColumn("receipt_id");
            $table->dropColumn("parent_id");
            $table->integer("rate_id")->unsigned();
            $table->foreign('rate_id')->references('id')->on('rates')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rates', function (Blueprint $table) {
            $table->dropForeign(["receipt_id"]);
            $table->dropColumn("receipt_id");
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn("rate_id");
        });

    }
}
