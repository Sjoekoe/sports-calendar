<?php

use App\Accommodations\Accommodation;
use App\Accounts\Account;
use App\Rosters\Roster;
use App\Types\Type;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRostersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Roster::TABLE, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('limit');
            $table->text('remark');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on(Type::TABLE)->onDelete('cascade');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->integer('account_id')->unsigned();
            $table->foreign('account_id')->references('id')->on(Account::TABLE)->onDelete('cascade');
            $table->integer('accommodation_id')->unsigned();
            $table->foreign('accommodation_id')->references('id')->on(Accommodation::TABLE)->onDelete('cascade');
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
        Schema::drop(Roster::TABLE);
    }
}
