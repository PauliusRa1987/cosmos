<?php

use App\Models\Country;
use App\Models\Union;
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
        Schema::create('country_union', function (Blueprint $table) {
            $table->foreignIdFor(Country::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Union::class)->constrained()->onDelete('cascade');
            $table->primary(['country_id', 'union_id']);

            $table->index('country_id');
            $table->index('union_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country_union');
    }
};
