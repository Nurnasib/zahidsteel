<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->integer('serial')->default(0)->after('teamType');
        });

        // Seed existing rows with the order they are currently displayed in
        // (the lists were ordered by id desc) so nothing visibly moves.
        $serial = 1;
        foreach (DB::table('teams')->orderBy('id', 'desc')->pluck('id') as $id) {
            DB::table('teams')->where('id', $id)->update(['serial' => $serial++]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn('serial');
        });
    }
};
