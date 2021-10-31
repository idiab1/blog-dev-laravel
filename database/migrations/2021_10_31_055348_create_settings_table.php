<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("web_name")->nullable()->default("Text");
            $table->string("phone_number")->nullable()->default("+123456789");
            $table->string("web_email")->nullable()->default("web@test.com");
            $table->string("address")->nullable()->default("Cairo");
            $table->text("about_us")->nullable()->default("About Us");
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
        Schema::dropIfExists('settings');
    }
}
