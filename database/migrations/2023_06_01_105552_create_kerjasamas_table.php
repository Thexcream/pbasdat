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
        Schema::create('kerjasamas', function (Blueprint $table) {
            $table->id();
            $table->string("rpb",1000);
            $table->string("kp1", 200);
            $table->string("kp2", 200);
            $table->string("kp3", 200);
            $table->string("jeniskerjasama",100);
            $table->string("jumlahijazah",100);
            $table->string("nama1",100);
            $table->string("nama2",100);
            $table->string("jabatan1",100);
            $table->string("jabatan2",100);
            $table->string("kcm",100);
            $table->string("ps",100);
            $table->string("sp",100);
            $table->string("penjadwalan",100);
            $table->string("skijazah",100);
            $table->string("ksl",100);
            $table->enum('studimoa',['ya','tidak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerjasamas');
    }
};
