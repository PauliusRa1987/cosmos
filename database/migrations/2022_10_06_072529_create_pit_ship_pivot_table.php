<?php

use App\Models\Pit;
use App\Models\Ship;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pit_ship', function (Blueprint $table) {
            $table->foreignIdFor(Pit::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Ship::class)->constrained()->onDelete('cascade');
            $table->primary(['pit_id', 'ship_id']);

            $table->index('pit_id');
            $table->index('ship_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pit_ship');
    }
};
