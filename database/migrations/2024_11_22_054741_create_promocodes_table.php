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
        Schema::create('promocodes', function (Blueprint $table) {
            $table->id();
            $table->string('programCode'); // programCode from the event, courses, etc.
            $table->string('promocode');
            $table->date('startDate');
            $table->date('endDate');
            $table->decimal('price', 10, 2)->default(0);
            $table->boolean('isActive')->default(true);
            $table->integer('usedCount')->default(0);
            $table->integer('maxUses')->default(0);
            $table->string('createdBy')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promocodes');
    }
};