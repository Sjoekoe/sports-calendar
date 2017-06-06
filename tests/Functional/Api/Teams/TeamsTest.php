<?php

use App\Teams\Team;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TeamsTest extends \TestCase
{
    use DatabaseTransactions;

    /** @test */
    function it_can_get_all_teams_paginated_for_an_account()
    {
        $account = $this->createAccount();
        $team = $this->createTeam([
            'account_id' => $account->id(),
        ]);

        $this->get('/api/' . $account->id() . '/teams')
            ->seeJsonEquals([
                'data' => [
                    $this->includedTeam($team),
                ],
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
    function it_can_create_a_team()
    {
        $account = $this->createAccount();
        $user = $this->createUser();

        $this->post('/api/' . $account->id() . '/teams', [
            'user_id' => $user->id(),
        ])->seeJsonEquals([
                'data' => [
                    'id' => DB::Table(Team::TABLE)->first()->id,
                    'userRelation' => ['data' => $this->includedUser($user)],
                    'accountRelation' => ['data' => $this->includedAccount($account)],
                ]
            ]);
    }

    /** @test */
    function it_can_show_a_team()
    {
        $team = $this->createTeam();

        $this->get('/api/' . $team->account()->id() . '/teams/' . $team->id())
            ->seeJsonEquals([
                'data' => $this->includedTeam($team),
            ]);
    }

    /** @test */
    function it_can_delete_a_team()
    {
        $team = $this->createTeam();

        $this->seeInDatabase(Team::TABLE, [
            'id' => $team->id(),
        ]);

        $this->delete('/api/' . $team->account()->id() . '/teams/' . $team->id())
            ->assertNoContent();

        $this->missingFromDatabase(Team::TABLE, [
            'id' => $team->id(),
        ]);
    }
}
