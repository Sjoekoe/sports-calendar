<?php

use App\Athletes\Athlete;
use Carbon\Carbon;
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
    function it_can_create_an_athlete()
    {
        $user = $this->loginAsUser();

        $this->post('/api/athletes', [
            'name' => 'Create athlete',
            'email' => 'athlete@email.com',
            'phone' => '',
            'birthday' => '08-06-1982',
        ], $this->setJWTHeaders($user))
            ->seeJsonEquals([
                'data' => [
                    'id' => DB::table(Athlete::TABLE)->first()->id,
                    'name' => 'Create athlete',
                    'email' => 'athlete@email.com',
                    'phone' => '',
                    'birthday' => Carbon::now()->year(1982)->month(6)->day(8)->startOfDay()->toIso8601String(),
                    'userRelation' => [
                        'data' => $this->includedUser($user)
                    ]
                ]
            ]);
    }

    /** @test */
    function it_can_show_an_athlete_for_a_user()
    {
        $user = $this->loginAsUser();
        $athlete = $this->createAthlete([
            'user_id' => $user->id(),
        ]);

        $this->get('/api/athletes/' . $athlete->id(), $this->setJWTHeaders($user))
            ->seeJsonEquals([
                'data' => $this->includedAthlete($athlete),
            ]);
    }

    /** @test */
    function it_can_update_an_athlete()
    {
        $user = $this->loginAsUser();
        $athlete = $this->createAthlete([
            'user_id' => $user->id(),
        ]);

        $this->put('/api/athletes/' . $athlete->id(), [
            'name' => 'updatedAthlete',
            'birthday' => '08-06-1982',
            'phone' => '',
            'email' => 'update@email.com',
        ], $this->setJWTHeaders($user))
            ->seeJsonEquals([
                'data' => $this->includedAthlete($athlete, [
                    'name' => 'updatedAthlete',
                    'birthday' => Carbon::now()->year(1982)->month(6)->day(8)->startOfDay()->toIso8601String(),
                    'email' => 'update@email.com',
                    'phone' => '',
                ])
            ]);
    }

    /** @test */
    function it_can_delete_an_athlete()
    {
        $user = $this->loginAsUser();
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
