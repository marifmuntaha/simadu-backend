<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registrants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user');
            $table->string('name');
            $table->string('nisn')->nullable();
            $table->string('nik')->nullable();
            $table->string('birthplace')->nullable();
            $table->date('birthday')->nullable();
            $table->enum('gender', [1, 2])->nullable();
            $table->enum('statusonfamily', [1, 2])->nullable();
            $table->string('placechild')->nullable();
            $table->string('siblings')->nullable();
            $table->string('phone')->nullable();

            $table->unsignedBigInteger('major')->nullable();
            $table->enum('boarding', [1, 2])->nullable()->comment('1. Ya, 2. Tidak');
            $table->unsignedBigInteger('program')->nullable();

            $table->string('kk_number')->nullable();
            $table->string('kk_head')->nullable();

            $table->enum('father_status', [1, 2, 3])->nullable()->comment('1. Hidup, 2. Meninggal, 3. Tidak diketahui');
            $table->string('father_name')->nullable();
            $table->string('father_nik')->nullable();
            $table->string('father_birthplace')->nullable();
            $table->date('father_birthday')->nullable();
            $table->enum('father_job', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18])->nullable()
                ->comment("1. Tidak Bekerja, 2. Pensiunan, 3. PNS, 4. TNI/Polisi, 5. Guru/Dosen, 6. Pegawai Swasta,
            7. Wiraswasta, 8. Pengacara/Jaksa/Hakim/Notaris, 9. Seniman/Pelukis/Artis/Sejenis, 10. Dokter/Bidan/Perawat,
            11. Pilot/Pramugara, 12. Pedagang, 13. Petani/Peternak, 14. Nelayan, 15. Buruh (Tani/Pabrik/Bangunan),
            16. Sopir/Masinis/Kondektur, 17. Politikus, 18. Lainnya");
            $table->string('father_phone')->nullable();

            $table->enum('mother_status', [1, 2, 3])->nullable()->comment('1. Hidup, 2. Meninggal, 3. Tidak diketahui');
            $table->string('mother_name')->nullable();
            $table->string('mother_nik')->nullable();
            $table->string('mother_birthplace')->nullable();
            $table->date('mother_birthday')->nullable();
            $table->enum('mother_job', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18])->nullable()
                ->comment("1. Tidak Bekerja, 2. Pensiunan, 3. PNS, 4. TNI/Polisi, 5. Guru/Dosen, 6. Pegawai Swasta,
            7. Wiraswasta, 8. Pengacara/Jaksa/Hakim/Notaris, 9. Seniman/Pelukis/Artis/Sejenis, 10. Dokter/Bidan/Perawat,
            11. Pilot/Pramugara, 12. Pedagang, 13. Petani/Peternak, 14. Nelayan, 15. Buruh (Tani/Pabrik/Bangunan),
            16. Sopir/Masinis/Kondektur, 17. Politikus, 18. Lainnya");
            $table->string('mother_phone')->nullable();

            $table->enum('guard_status', [1, 2, 3])->nullable()->comment('1. Hidup, 2. Meninggal, 3. Tidak diketahui');
            $table->string('guard_name')->nullable();
            $table->string('guard_nik')->nullable();
            $table->string('guard_birthplace')->nullable();
            $table->date('guard_birthday')->nullable();
            $table->enum('guard_job', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18])->nullable()
                ->comment("1. Tidak Bekerja, 2. Pensiunan, 3. PNS, 4. TNI/Polisi, 5. Guru/Dosen, 6. Pegawai Swasta,
            7. Wiraswasta, 8. Pengacara/Jaksa/Hakim/Notaris, 9. Seniman/Pelukis/Artis/Sejenis, 10. Dokter/Bidan/Perawat,
            11. Pilot/Pramugara, 12. Pedagang, 13. Petani/Peternak, 14. Nelayan, 15. Buruh (Tani/Pabrik/Bangunan),
            16. Sopir/Masinis/Kondektur, 17. Politikus, 18. Lainnya");
            $table->string('guard_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrants');
    }
};
