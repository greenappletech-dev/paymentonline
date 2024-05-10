<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsOnProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_offices', function (Blueprint $table) {
            $table->string('housing_material_code')->nullable();
            $table->string('lot_code')->nullable();
            $table->string('housing_material_name')->nullable();
            $table->string('lot_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_offices', function (Blueprint $table) {
            $table->dropColumn('housing_material_code');
            $table->dropColumn('lot_code');
        });
    }
}
