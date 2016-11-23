<?php
namespace Jitesoft\Web\App\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Schema;

class CreateNewsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('news_items', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id', false, true);
            $table->string("header");
            $table->text("body");
            $table->timestamps();

            $table->foreign('author_id', 'news_item_author_id_foreign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('news_items', function(Blueprint $table) {
            $table->dropForeign('news_item_author_id_foreign');
            $table->drop();
        });
    }
}
