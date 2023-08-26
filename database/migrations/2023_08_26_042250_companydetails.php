<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companydetails', function (Blueprint $table) {
            $table->id();
            $table->string('companyname');
            $table->string('email')->unique();
            $table->bigInteger('mobile');
            $table->string('address');
            $table->string('logo');
            $table->string('sign');
            $table->string('bankname');
            $table->bigInteger('bankacnum');
            $table->string('ifsccode');
            $table->string('acholdername');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
