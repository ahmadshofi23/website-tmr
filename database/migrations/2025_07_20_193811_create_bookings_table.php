<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('from');
            $table->string('to');
            $table->string('name');
            $table->string('phone');
            $table->date('date');
            $table->timestamps();
        });
    }


    public function down(): void {
        Schema::dropIfExists('bookings');
    }
};