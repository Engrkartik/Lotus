<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::dropIfExists('admins');

        Schema::create('admin', function (Blueprint $table) {
                //
             $table->id();
            $table->string('company_name',100);
            $table->string('email',100);
            $table->string('password',100);
            $table->string('phone_number',100);
            $table->string('address',255);
            $table->string('state',100);
            $table->string('city',100);
            $table->string('pin_code',100);
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
        Schema::table('admin', function (Blueprint $table) {
            //
        });
    }
}
