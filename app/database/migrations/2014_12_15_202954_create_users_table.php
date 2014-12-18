<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string("email", 255);
            $table->string("password");
            $table->string("name", 255);
            $table->string("domain", 255);
            $table->boolean("domain_owner")->default(0);
            $table->boolean("email_is_confirmed")->default(0);
            $table->string('remember_token', 255)->nullable();
            $table->boolean("active")->default(1);
            $table->binary("profile")->nullable();
            $table->boolean("is_admin")->default(0);
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
        Schema::dropIfExists("users");
	}

}
