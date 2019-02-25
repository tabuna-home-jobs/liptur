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

        DB::statement('UPDATE `attachmentable` SET `attachmentable_type` = \'Orchid\\Press\\Models\\Post\'  WHERE `attachmentable_type` LIKE \'Orchid\\Platform\\Core\\Models\\Post\' ');
        DB::statement('UPDATE `tagged` SET `taggable_type` = \'Orchid\\Press\\Models\\Post\'  WHERE `taggable_type` LIKE \'Orchid\\Foundation\\Core\\Models\\Post\' ');
        DB::statement('UPDATE `tagged` SET `taggable_type` = \'Orchid\\Press\\Models\\Post\'  WHERE `taggable_type` LIKE \'Orchid\\Platform\\Core\\Models\\Post\' ');
        DB::statement('UPDATE `tags` SET `namespace` = \'Orchid\\Press\\Models\\Post\'  WHERE `namespace` LIKE \'Orchid\\Foundation\\Core\\Models\\Post\' ');
        DB::statement('UPDATE `tags` SET `namespace` = \'Orchid\\Press\\Models\\Post\'  WHERE `namespace` LIKE \'Orchid\\Platform\\Core\\Models\\Post\' ');




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
