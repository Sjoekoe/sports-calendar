<?php

use App\Athletes\Athlete;
use App\Rosters\Roster;
use App\Subscriptions\Subscription;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Subscription::TABLE, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roster_id')->unsigned();
            $table->foreign('roster_id')->references('id')->on(Roster::TABLE)->onDelete('cascade');
            $table->integer('athlete_id')->unsigned();
            $table->foreign('athlete_id')->references('id')->on(Athlete::TABLE)->onDelete('cascade');
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
        Schema::drop(Subscription::TABLE);
    }
}
