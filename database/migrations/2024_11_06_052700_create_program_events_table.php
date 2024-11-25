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
        Schema::create('program_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('partner_id');
            $table->unsignedInteger('program_id');
            $table->string('type')->default('event');
            $table->string('programCode')->unique();
            $table->string('title');
            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();
            $table->time('startTime')->nullable();
            $table->time('endTime')->nullable();
            $table->dateTime('activeUntil')->nullable();
            $table->string('customDate')->nullable();
            $table->string('venue')->nullable();
            $table->string('latLong')->nullable();
            $table->decimal('price', 8,2)->default(0);
            $table->decimal('adminFee', 8,2)->default(0);
            $table->string('thumb')->nullable();
            $table->string('a3_poster')->nullable();
            $table->string('excerpt')->nullable();
            $table->text('description')->nullable();
            $table->string('contactNumber')->nullable();
            $table->string('contactPerson')->nullable();
            $table->string('contactEmail')->nullable();
            $table->string('chequeCode')->nullable();
            $table->integer('limit')->default(0);
            $table->text('settings')->nullable();
            $table->text('extraFields')->nullable();
            $table->boolean('searchable')->default(true);
            $table->boolean('publishable')->default(true);
            $table->boolean('private_only')->default(false);
            $table->string('externalUrl')->nullable();
            $table->boolean('soft_delete')->default(false);
            $table->string('status')->nullable(); // draft, publish, for approval
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_events');
    }
};
