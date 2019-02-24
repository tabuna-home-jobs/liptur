<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdateNewOrchid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('UPDATE `attachmentable` SET `attachmentable_type` = REPLACE( `attachmentable_type`, \'Orchid\\Platform\\Core\\Models\\Post\', \'Orchid\\Press\\Models\\Post\' )');
        DB::statement('UPDATE `tagged` SET `taggable_type` = REPLACE( `taggable_type`, \'Orchid\\Foundation\\Core\\Models\\Post\', \'Orchid\\Press\\Models\\Post\' );');
        DB::statement('UPDATE `tagged` SET `taggable_type` = REPLACE( `taggable_type`, \'Orchid\\Platform\\Core\\Models\\Post\', \'Orchid\\Press\\Models\\Post\' );');
        DB::statement('UPDATE `tags` SET `namespace` = REPLACE( `namespace`, \'Orchid\\Foundation\\Core\\Models\\Post\', \'Orchid\\Press\\Models\\Post\' );');
        DB::statement('UPDATE `tags` SET `namespace` = REPLACE( `namespace`, \'Orchid\\Platform\\Core\\Models\\Post\', \'Orchid\\Press\\Models\\Post\' )');

        Schema::table('attachments', function (Blueprint $table) {
           $table->string('disk')->default('public');
           $table->string('group')->nullable();
       });
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
