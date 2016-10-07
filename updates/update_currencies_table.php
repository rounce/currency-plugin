<?php namespace Responsiv\Currency\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class UpdateCurrenciesTable extends Migration
{
    public function up()
    {
        Schema::table('kernel_booking_apartament', function($table)
        {
            $table->integer('minimum')->nullable(false)->unsigned()->default(null);
        });
    }
    
    public function down()
    {
        Schema::table('kernel_booking_apartament', function($table)
        {
            $table->dropColumn('miniumum');
        });
    }
}
