<?php

use App\Models\letterTypes;
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
        Schema::create('letter_types', function (Blueprint $table) {
            $table->id();
            $table->string('typeCode');
            $table->string('typeName');
            $table->string('numberingRule');
            $table->integer('lastNumber');
            $table->softDeletes();
            $table->timestamps();
        });

        LetterTypes::create([
            'typeCode' => 'PD',
            'typeName' => 'President Director Letter',
            'numberingRule' => '<number>/LTR/GCLIT/<year>',
            'lastNumber' => 0
        ]);
        LetterTypes::create([
            'typeCode' => 'TD',
            'typeName' => 'Technical Director Letter',
            'numberingRule' => '<number>/LTR/TD/GCLIT/<year>',
            'lastNumber' => 0
        ]);
        LetterTypes::create([
            'typeCode' => 'FD',
            'typeName' => 'Finance Director Letter',
            'numberingRule' => '<number>/LTR/FD/GCLIT/<year>',
            'lastNumber' => 0
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('letter_types');
    }
};
