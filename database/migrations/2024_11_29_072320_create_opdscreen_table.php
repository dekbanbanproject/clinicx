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
        if (!Schema::hasTable('opdscreen'))
        {
        Schema::create('opdscreen', function (Blueprint $table) {
            $table->bigIncrements('opdscreen_id');  
                $table->string('vn')->nullable();// 
                $table->string('hn')->nullable();// 
                $table->string('bpd')->nullable();// 
                $table->string('bps')->nullable();// 
                $table->string('bw')->nullable();// 
                $table->string('hr')->nullable();// 
                $table->string('pulse')->nullable();// 
                $table->string('temperature')->nullable();//  อุณหภูมิ
                $table->string('weight')->nullable();//    น้ำหนัก
                $table->string('height')->nullable();//    สูง
                $table->string('bmi')->nullable();// 
                $table->string('vstdate')->nullable();   //วันที่               
                $table->Time('vsttime')->nullable();//   เวลา  
                $table->longText('cc')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opdscreen');
    }
};
