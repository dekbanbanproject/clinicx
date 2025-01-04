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
        if (!Schema::hasTable('onestop'))
        {
        Schema::create('onestop', function (Blueprint $table) {
            $table->bigIncrements('onestop_id');  
                $table->string('vn')->nullable();// 
                $table->string('an')->nullable();// 
                $table->string('hn')->nullable();// 
                $table->string('vstdate')->nullable();   //วันที่               
                $table->Time('vsttime')->nullable();//   เวลา  
                $table->string('dchdate')->nullable();   //วันที่               
                $table->Time('dchtime')->nullable();//   เวลา  

                $table->string('height')->nullable();//ส่วนสูง
                $table->string('weight')->nullable();//น้ำหนัก
                $table->string('pressure')->nullable();//ความดัน
                $table->string('pulse')->nullable();//ชีพจร
                $table->string('respiration')->nullable();//อัตราการหายใจ

                $table->string('pdx')->nullable();// 
                $table->string('pttype')->nullable();// 
                $table->string('pttype_no')->nullable();//  
                $table->string('maindep')->nullable();// 
                $table->string('hospmain')->nullable();//   
                $table->string('hospsub')->nullable();// 

                $table->string('income')->nullable();// 
                $table->string('rcpt_money')->nullable();// 
                $table->string('discount')->nullable();//  
                $table->string('debit_total')->nullable();// 

                $table->string('store_code')->nullable();//   
                $table->string('user_id')->nullable();//  
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('onestop');
    }
};
