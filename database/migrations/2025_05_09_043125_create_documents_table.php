<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('null');
            $table->foreignId('processed_by')->nullable()->constrained('employees')->onDelete('set null');
            $table->string('document_title');
            $table->string('employee_name');
            $table->text('description')->nullable();
            $table->enum('status', [
                'pending', 
                'in_progress',
                'approved',
                'rejected',  
                'completed' 
            ])->default('pending');
            $table->text('rejection_reason')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
};
