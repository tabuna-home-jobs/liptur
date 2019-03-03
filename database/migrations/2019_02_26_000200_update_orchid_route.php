<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdateOrchidRoute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::table('term_taxonomy', function (Blueprint $table) {
            $table->unsignedInteger('parent_id')->nullable();
        });*/

        DB::statement('UPDATE `term_taxonomy` SET `parent_id`= NULL WHERE `parent_id`= 0');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
