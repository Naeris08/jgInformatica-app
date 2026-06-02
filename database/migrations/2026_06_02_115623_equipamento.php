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
        Schema::create('equipamentos', function (Blueprint $table) {
				$table->id();                                         
				$table->string('title');                              
				$table->string('modelo');                             
                $table->string('marca'); 
                $table->integer('tensao')->unsigned();
                $table->string('tamanhoTela');
                $table->string('cor');
                $table->string('material');
                $table->text('acessorios');
                $table->string('resolucaoTela');
                $table->string('processador');
                $table->integer('memoriaRam')->unsigned();
                $table->integer('armazenamento')->unsigned();
                $table->boolean('wifi')->default(false);
                $table->boolean('portasEthernet')->default(false);
                $table->boolean('bluetooth')->default(false);
                $table->integer('portasUSB')->unsigned();
                $table->integer('portasHDMI')->unsigned();
                $table->string('image')->nullable();
                $table->integer('quantidade')->default(0);
				$table->foreignId('tipos_equipamentos_id')                       
					->constrained('tipos_equipamentos')                  
					->onDelete('cascade');                            
			$table->timestamps();                                   
			});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipamentos');
    }
};
