<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('assign_by')->constrained('users');
            $table->foreignId('assign_to')->nullable()->constrained('users');;
            $table->unsignedTinyInteger('status');
            $table->dateTime('due_date')->nullable();
            $table->unsignedTinyInteger('priority');
            $table->foreignId('blocked_by')->nullable();
            $table->foreign('blocked_by')->references('id')->on('tasks')->nullOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
