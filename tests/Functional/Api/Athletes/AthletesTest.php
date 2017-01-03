<?php

use App\Athletes\Athlete;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AthletesTest extends \TestCase
{
    use DatabaseTransactions;

    /** @test */
    function it_can_show_all_athletes_for_a_user()
    {
        $user = $this->loginAsUser();
        $athlete = $this->createAthlete([
            'user_id' => $user->id(),
        ]);

        $this->get('/api/athletes', $this->setJWTHeaders($user))
            ->seeJsonEquals([
                'data' => [$this->includedAthlete($athlete)],
                'meta' => [
                    'pagination' => [
                        'count' => 1,
                        'current_page' => 1,
                        'links' => [],
                        'per_page' => 10,
                        'total' => 1,
                        'total_pages' => 1,
                    ],
                ]
            ]);
    }

    /** @test */
    function it_can_show_an_athlete_for_a_user()
    {
        $user = $this->loginAsUser(['email' => 'login@user.com']);
        $athlete = $this->createAthlete([
            'user_id' => $user->id(),
        ]);

        $this->get('/api/athletes/' . $athlete->id(), $this->setJWTHeaders($user))
            ->seeJsonEquals([
                'data' => $this->includedAthlete($athlete),
            ]);
    }

    /** @test */
    function it_can_delete_an_athlete()
    {
        $user = $this->loginAsUser(['email' => 'login@user.com']);
        $athlete = $this->createAthlete([
            'user_id' => $user->id(),
        ]);

        $this->seeInDatabase(Athlete::TABLE, [
            'id' => $athlete->id(),
        ]);

        $this->delete('/api/athletes/' . $athlete->id(), [], $this->setJWTHeaders($user))
            ->assertNoContent();

        $this->missingFromDatabase(Athlete::TABLE, [
            'id' => $athlete->id(),
        ]);
    }
}
