<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('logo')->nullable();
            $table->string('name')->nullable();
            $table->string('famly_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('fix')->nullable();
            $table->string('address')->nullable();
            $table->string('position')->nullable();
            $table->string('poste')->nullable();
            $table->string('socite')->nullable();
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->string('fb')->nullable();
            $table->string('insta')->nullable();
            $table->string('youtube')->nullable();
            $table->string('tiktok')->nullable();
            $table->foreignId('user_id')->onDelete('cascade');
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
        Schema::dropIfExists('cards');
    }
};
