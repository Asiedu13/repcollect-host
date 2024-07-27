<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('focus', function (Blueprint $table) {
            $table->id('id');
            $table->foreignIdFor(User::class)->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->float('desired_amount')->nullable();
            $table->datetime('end_date')->nullable();
            $table->string('tags')->nullable();
            $table->float('cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('focus');
    }
};
