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
        Schema::table('insumos', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('brand_id')->constrained('brands');
            $table->foreignId('unit_id')->constrained('units');
        });
    }
2......................................................................................................................................................................................................................................................................................................................................................................................
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('insumos', function (Blueprint $table) {
            //
        });
    }
};
