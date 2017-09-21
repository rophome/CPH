<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddShortDescriptionToTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function ($table) {
            $table->string('short_description')->nullable();
        });
    }

// and don't forget to add the rollback option:

    public function down()
    {
        Schema::table('tasks', function ($table) {
            $table->dropColumn('short_description');
        });
    }
}
