<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTablePages extends Migration
{
    public function up() {
        Schema::create("pages", function(Blueprint $table) {
            $table->increments("id");
            $table->string("title");
            $table->text("body");
            $table->boolean("active");

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::drop("pages");
    }
}
