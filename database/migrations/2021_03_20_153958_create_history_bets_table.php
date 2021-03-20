<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_bets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("room_id");
            $table->integer("winner")->default(0);

            $table->foreign("user_id")->references("id")->on("users")->onDelete("Cascade");
            $table->foreign("room_id")->references("id")->on("rooms")->onDelete("Cascade");
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
        Schema::table("history_bets", function (Blueprint $table) {
            $table->dropForeign("history_bets_user_id_foreign");
            $table->dropForeign("history_bets_room_id_foreign");
        });

        Schema::dropIfExists('history_bets');
    }
}
