<?php
namespace App\Api\Http\Controllers;

use App\Accounts\Account;
use App\Api\Teams\Requests\StoreTeamRequest;
use App\Api\Teams\TeamTransformer;
use App\Teams\Team;
use App\Teams\TeamRepository;

class TeamController extends Controller
{
    /**
     * @var \App\Teams\TeamRepository
     */
    private $teams;

    public function __construct(TeamRepository $teams)
    {
        $this->teams = $teams;
    }

    public function index(Account $account)
    {
        $teams = $this->teams->findByAccountPaginated($account);

        return $this->response()->paginator($teams, new TeamTransformer());
    }

    public function store(Account $account, StoreTeamRequest $request)
    {
        $team = $this->teams->create($account, $request->all());

        return $this->response()->item($team, new TeamTransformer());
    }

    public function show(Account $account, Team $team)
    {
        return $this->response()->item($team, new TeamTransformer());
    }

    public function delete(Account $account, Team $team)
    {
        $this->teams->delete($team);

        return $this->response()->noContent();
    }
}
