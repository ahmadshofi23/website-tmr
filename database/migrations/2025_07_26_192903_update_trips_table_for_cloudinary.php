<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateTripsTableForCloudinary extends Migration
{
    public function up()
    {
        Schema::table('trips', function (Blueprint $table) {
            // Tambahkan kolom image jika belum ada
            if (!Schema::hasColumn('trips', 'image')) {
                $table->string('image')->nullable()->after('gambar');
            }

            // Migrasikan data dari kolom lama ke kolom baru
            if (Schema::hasColumn('trips', 'gambar') && Schema::hasColumn('trips', 'image')) {
                DB::table('trips')->update([
                    'image' => DB::raw('gambar')
                ]);
            }
        });

        // Hapus kolom gambar lama setelah migrasi
        if (Schema::hasColumn('trips', 'gambar')) {
            Schema::table('trips', function (Blueprint $table) {
                $table->dropColumn('gambar');
            });
        }
    }

    public function down()
    {
        // Tambahkan kembali kolom gambar jika dibutuhkan saat rollback
        Schema::table('trips', function (Blueprint $table) {
            if (!Schema::hasColumn('trips', 'gambar')) {
                $table->string('gambar')->nullable()->after('image');
            }

            if (Schema::hasColumn('trips', 'image') && Schema::hasColumn('trips', 'gambar')) {
                DB::table('trips')->update([
                    'gambar' => DB::raw('image')
                ]);
            }
        });

        // Hapus kolom image
        if (Schema::hasColumn('trips', 'image')) {
            Schema::table('trips', function (Blueprint $table) {
                $table->dropColumn('image');
            });
        }
    }
}
