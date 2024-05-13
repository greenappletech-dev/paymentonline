<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectBcs0030Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('project_bcs0030', function (Blueprint $table) {
            $table->id();
            $table->integer('project_office_id');
            $table->string('bin');
            $table->string('acct_type');
            $table->decimal('act_bal', 13,2);
            $table->date('fod');
            $table->date('upload_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('project_bcs0030');
    }
}
