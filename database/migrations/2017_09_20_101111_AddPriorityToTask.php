<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddPriorityToTask extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function ($table) {
            $table->integer('priority')->default(0);
        });
    }

// and don't forget to add the rollback option:

    public function down()
    {
        Schema::table('tasks', function ($table) {
            $table->dropColumn('priority');
        });
    }
}
