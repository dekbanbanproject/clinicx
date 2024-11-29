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
        if (!Schema::hasTable('opitems'))
        {
        Schema::create('opitems', function (Blueprint $table) {
            $table->bigIncrements('opitems_id');  
                $table->string('vn')->nullable();// 
                $table->string('an')->nullable();// 
                $table->string('hn')->nullable();// 
                $table->string('vstdate')->nullable();   //วันที่               
                $table->Time('vsttime')->nullable();//   เวลา  

                $table->string('icode')->nullable();// 
                $table->string('qty')->nullable();// 
                $table->string('unit_price')->nullable();// 
                $table->string('sum_price')->nullable();// 
                $table->string('income')->nullable();// 
                $table->string('paid')->nullable();// 
                $table->string('finan_no')->nullable();//   
                $table->string('discount')->nullable();//     
                $table->string('pttype')->nullable();//  
                $table->string('store_code')->nullable();//   
                $table->string('user_id')->nullable();//  
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
        Schema::dropIfExists('opitems');
    }
};
