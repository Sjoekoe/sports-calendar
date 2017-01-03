<?php
namespace App\Api\Http\Controllers;

use App\Api\Athletes\AthleteTransformer;
use App\Athletes\Athlete;
use App\Athletes\AthleteRepository;
use App\Users\User;

class AthleteController extends Controller
{
    /**
     * @var \App\Athletes\AthleteRepository
     */
    private $athletes;

    public function __construct(AthleteRepository $athletes)
    {
        $this->athletes = $athletes;
    }

    public function index(User $user)
    {
        $athletes = $this->athletes->findForUserPaginated($user);

        return $this->response()->paginator($athletes, new AthleteTransformer());
    }

    public function show(User $user, Athlete $athlete)
    {
        return $this->response()->item($athlete, new AthleteTransformer());
    }

    public function delete(User $user, Athlete $athlete)
    {
        $this->athletes->delete($athlete);

        return $this->response()->noContent();
    }
}
