<?php

use App\Models\letterStatus;
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
        Schema::create('letter_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('color');
            $table->timestamps();
        });

        letterStatus::create([
            'title' => 'Not Archieved',
            'color' => 'warning'
        ]);
        letterStatus::create([
            'title' => 'Cancelled',
            'color' => 'danger'
        ]);
        letterStatus::create([
            'title' => 'Archived',
            'color' => 'success'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('letter_statuses');
    }
};
