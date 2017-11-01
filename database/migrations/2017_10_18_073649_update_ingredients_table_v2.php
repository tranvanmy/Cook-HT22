<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateIngredientsTableV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("ingredients", function (Blueprint $table) {
            $table->integer("unit_id")->nullable()->change();
        });

        Schema::table("users", function (Blueprint $table) {
            $table->integer("rank")->default(1);
        });

        Schema::table("receipts", function (Blueprint $table) {
            $table->text("description")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("ingredients", function (Blueprint $table) {
            $table->dropColumn("unit_id");
        });
        Schema::table("users", function (Blueprint $table) {
            $table->dropColumn("rank");
        });

        Schema::table("receipts", function (Blueprint $table) {
            $table->dropColumn("description");
        });
    }
}
