<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_sub_admins', function (Blueprint $table) {
            $table->id();
            $table->string('branch_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('branch_location')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('branch_image')->nullable();
            $table->boolean('status')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('add_sub_admins');
    }
};
