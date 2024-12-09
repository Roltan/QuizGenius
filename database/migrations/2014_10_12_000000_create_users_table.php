<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable()->unique();
            $table->string('password')->nullable();
            $table->string('tg_id')->nullable()->unique();
            $table->boolean('is_admin')->default(false);
            $table->timestamps();
        });

        // триггеры. проверяют что emil или tg_id должны быть у пользователя. и что пароль обязателен если tg_id пустое
        DB::unprepared('
            CREATE TRIGGER before_insert_check_tg_id_email_password
            BEFORE INSERT ON your_table_name
            FOR EACH ROW
            BEGIN
                IF NEW.tg_id IS NULL AND NEW.email IS NULL THEN
                    SIGNAL SQLSTATE \'45000\'
                        SET MESSAGE_TEXT = \'Either tg_id or email must be provided\';
                END IF;

                IF NEW.password IS NULL AND NEW.tg_id IS NULL THEN
                    SIGNAL SQLSTATE \'45000\'
                        SET MESSAGE_TEXT = \'Password must be provided if tg_id is not set\';
                END IF;
            END;
        ');

        DB::unprepared('
            CREATE TRIGGER before_update_check_tg_id_email_password
            BEFORE UPDATE ON your_table_name
            FOR EACH ROW
            BEGIN
                IF NEW.tg_id IS NULL AND NEW.email IS NULL THEN
                    SIGNAL SQLSTATE \'45000\'
                        SET MESSAGE_TEXT = \'Either tg_id or email must be provided\';
                END IF;

                IF NEW.password IS NULL AND NEW.tg_id IS NULL THEN
                    SIGNAL SQLSTATE \'45000\'
                        SET MESSAGE_TEXT = \'Password must be provided if tg_id is not set\';
                END IF;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS before_insert_check_tg_id_email_password');
        DB::unprepared('DROP TRIGGER IF EXISTS before_update_check_tg_id_email_password');
        Schema::dropIfExists('users');
    }
};
