<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHashToPage extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('pages', function(Blueprint $table) {
            $table->string("text_hash");
        });

        // Need to remove all prior values.
        DB::table('pages')->truncate();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        if (Schema::hasColumn('pages', 'text_hash')) {
            Schema::table('pages', function(Blueprint $table) {
                $table->dropColumn('text_hash');
            });
        }
    }
}
