<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jw_properties.piercing_suitable', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('piercing_type_id');
            $table->unsignedBigInteger('piercing_site_id');
            $table->timestamps();

            $table->foreign('piercing_type_id')->references('id')->on('jw_properties.piercing_types');
            $table->foreign('piercing_site_id')->references('id')->on('jw_properties.piercing_sites');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_properties.piercing_suitable');
    }
};
