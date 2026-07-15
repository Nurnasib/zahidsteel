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
        Schema::create('email_configs', function (Blueprint $table) {
            $table->id();
            $table->string('mail_mailer')->nullable();
            $table->string('mail_host')->nullable();
            $table->string('port')->nullable();
            $table->string('mail_username')->nullable();
            $table->string('password')->nullable();
            $table->string('mail_encryption')->nullable();
            $table->string('email_name')->nullable();
            $table->string('mail_name')->nullable();
            $table->enum('status',['active','inactive'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_configs');
    }
};
