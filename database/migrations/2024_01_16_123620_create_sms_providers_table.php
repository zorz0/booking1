<?php

use App\Models\SmsProvider;
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
        Schema::create('sms_providers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $this->create();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sms_providers');
    }

    public function create(){
        SmsProvider::create([
            'name' => 'stc'
        ]);
        SmsProvider::create([
            'name' => 'mobile'
        ]);
        SmsProvider::create([
            'name' => 'zane'
        ]);

    }
};
