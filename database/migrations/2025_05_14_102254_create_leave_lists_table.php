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
        Schema::create('leave_lists', function (Blueprint $table) {
            $table->id('id_leave_list');
            $table->bigInteger('id_users')->unsigned();
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
            $table->integer('total_leave_taken')->default(0);
            $table->date('leave_start_date')->nullable();
            $table->date('leave_end_date')->nullable();
            $table->string('leave_reason')->nullable();
            $table->string('leave_status')->default('pending');
            $table->bigInteger('leave_approval_by')->unsigned()->nullable();
            $table->foreign('leave_approval_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_lists');
    }
};
