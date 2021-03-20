<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("room_id");
            $table->integer("bet")->default(1);
            $table->boolean("finalized")->default(False);

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
        Schema::table("room_users", function (Blueprint $table) {
            $table->dropForeign("room_users_user_id_foreign");
            $table->dropForeign("room_users_room_id_foreign");
        });

        Schema::dropIfExists('room_users');
    }
}
