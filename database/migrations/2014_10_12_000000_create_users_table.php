<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('password')->nullable();

            //
            $table->string('name')->index();
            $table->string('email')->unique();
            $table->string('gender')->index();

            $table->string('nickname')->index()->nullable();
            $table->string('status')->index()->default('working');
            $table->string('employee_code')->index()->nullable();
            $table->text('avatar')->nullable();
            $table->date('birthday')->nullable();

            $table->date('start_date')->default(DB::raw('NOW()'));
            $table->date('end_date')->nullable();

            $table->jsonb('address')->index()->nullable();
            $table->jsonb('contact')->index()->nullable();
            $table->jsonb('finance')->index()->nullable();
            $table->jsonb('identification')->index()->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
