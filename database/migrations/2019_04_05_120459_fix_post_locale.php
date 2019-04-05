<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixPostLocale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("update posts set options = JSON_SET(options, '$.locale.ru', 'true')  where options->'$.locale.ru' = 'on'");
        DB::statement("update posts set options = JSON_SET(options, '$.locale.en', 'true')  where options->'$.locale.en' = 'on'");

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
