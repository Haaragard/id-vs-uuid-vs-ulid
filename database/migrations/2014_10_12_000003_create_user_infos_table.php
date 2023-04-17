<?php

use App\Models\IdUser;
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
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(IdUser::class, 'user_id')->nullable();
            $table->foreignUuid('user_uuid')
                ->nullable()
                ->references('uuid')
                ->on('uuid_users');
            $table->foreignUlid('user_ulid')
                ->nullable()
                ->references('ulid')
                ->on('ulid_users');

            $table->string('name');
            $table->string('second_name');
            $table->string('email');
            $table->string('second_email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_infos');
    }
};
