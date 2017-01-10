<?php

use App\Accounts\Account;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStripeFieldsToTheAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Account::TABLE, function (Blueprint $table) {
            $table->string('stripe_id')->nullable();
            $table->boolean('stripe_active')->default(false);
            $table->timestamp('subscription_end_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Account::TABLE, function (Blueprint $table) {
            $table->dropColumn('subscription_end_at');
            $table->dropColumn('stripe_active');
            $table->dropColumn('stripe_id');
        });
    }
}
