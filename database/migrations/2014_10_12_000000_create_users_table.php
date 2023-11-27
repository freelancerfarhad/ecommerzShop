<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create( 'users', function ( Blueprint $table ) {
            $table->id();
            $table->string('name');
            $table->string('email', 50 )->unique();
            $table->integer('role')->default(0);
            $table->string('provider_id')->nullable();
            $table->string('avatar')->nullable();
            $table->string('password')->nullable();

            $table->string('lname',100);
            $table->string('phone',100);
            $table->string('address1',100);
            $table->string('address2',100);
            $table->string('city',100);
            $table->string('state',100);
            $table->string('postcode',100);
            $table->string('country',100);



            $table->timestamp('created_at' )->useCurrent();
            $table->timestamp('updated_at' )->useCurrent()->useCurrentOnUpdate();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists( 'users' );
    }
};
