<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UserOauthTokens extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('user_oauth_tokens', function(Blueprint $table ) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('provider');
            $table->string('token');
            $table->string('oauth_id');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id', 'user_oauth_tokens_user_id_foreign')
                ->references('id')
                ->on('users')
                ->cascade('delete');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        Schema::table('user_oauth_tokens', function(Blueprint $table) {
            $table->dropForeign('user_oauth_tokens_user_id_foreign');
            $table->drop();
        });
    }
}
