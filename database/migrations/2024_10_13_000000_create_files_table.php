<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('folder_id');
            $table->string('name', 20);
            $table->integer('size');
            $table->string('path', 20);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('folder_id')->references('id')
                ->on('folders')->onDelete('cascade');
        });
    }
};
