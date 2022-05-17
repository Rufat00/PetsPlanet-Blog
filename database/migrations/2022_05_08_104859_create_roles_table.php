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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role')->unique();
            $table->boolean('permission_use_dashboard')->default(false);
            $table->boolean('permission_access_posts')->default(false);
            $table->boolean('permission_access_categories')->default(false);
            $table->boolean('permission_access_images')->default(false);
            $table->boolean('permission_access_roles')->default(false);
            $table->boolean('permission_access_users')->default(false);
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
        Schema::dropIfExists('roles');
    }
};
