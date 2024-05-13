<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectBcsdueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentonline_staging.project_bcsdue', function (Blueprint $table) {
            $table->id();
            $table->integer('project_office_id');
            $table->string('bin');
            $table->string('acct_type');
            $table->decimal('deb_amt', 13,2);
            $table->decimal('deb_del', 13,2);
            $table->decimal('deb_int', 13,2);
            $table->date('tx_date');
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
        Schema::dropIfExists('paymentonline_staging.project_bcsdue');
    }
}
