<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Gateway\Gateway;

class CreateAbstractGateWaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gateways', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('kind', Gateway::GATEWAYS);
            $table->string('merchant-id')->nullable();
            $table->string('type')->nullable();
            $table->string('callback-url')->nullable();
//            $table->string('email')->nullable();
//            $table->string('mobile', 11)->nullable();
            $table->text('description')->nullable();
            $table->string('terminalId')->nullable();
            $table->string('api')->nullable();
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
        Schema::dropIfExists('abstract_gate_ways');
    }
}
