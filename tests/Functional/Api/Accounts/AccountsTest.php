<?php

use App\Accounts\Account;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AccountsTest extends \TestCase
{
    use DatabaseTransactions;

    /** @test */
    function it_can_get_all_accounts_paginated()
    {
        $account = $this->createAccount();

        $this->get('/api/accounts')
            ->seeJsonEquals([
                'data' => [$this->includedAccount($account)],
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
    function it_can_create_an_account()
    {
        $this->post('/api/accounts', [
            'name' => 'Foo Account',
            'email' => 'Foo@email.com',
        ])->seeJsonEquals([
            'data' => [
                'id' => DB::table(Account::TABLE)->first()->id,
                'name' => 'Foo Account',
                'email' => 'Foo@email.com',
                'date_format' => 'd-m-Y',
                'time_format' => 'H:i',
            ]
        ]);
    }

    /** @test */
    function it_can_show_an_account()
    {
        $account = $this->createAccount();

        $this->get('/api/accounts/' . $account->id())
            ->seeJsonEquals([
                'data' => $this->includedAccount($account)
            ]);
    }

    /** @test */
    function it_can_update_an_account()
    {
        $account = $this->createAccount();

        $this->put('/api/accounts/' . $account->id(), [
            'email' => 'update@test.com',
            'name' => 'updated name',
        ])
        ->seeJsonEquals([
            'data' => $this->includedAccount($account, [
                'name' => 'updated name',
                'email' => 'update@test.com',
            ])
        ]);
    }

    /** @test */
    function it_can_delete_an_account()
    {
        $account = $this->createAccount();

        $this->seeInDatabase(Account::TABLE, [
            'id' => $account->id(),
        ]);

        $this->delete('/api/accounts/' . $account->id())
            ->assertNoContent();

        $this->missingFromDatabase(Account::TABLE, [
            'id' => $account->id(),
        ]);
    }
}
