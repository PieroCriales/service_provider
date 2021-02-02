<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("service_id");
            $table->unsignedBigInteger("user_id");
            $table->text("body");

            $table->foreign("service_id")->references("id")->on("services")->onDelete('Cascade');
            $table->foreign("user_id")->references("id")->on("users")->onDelete('Cascade');
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
        Schema::table("posts", function (Blueprint $table) {
            $table->dropForeign("posts_service_id_foreign");
            $table->dropForeign("posts_user_id_foreign");
        });

        Schema::dropIfExists('posts');
    }
}
