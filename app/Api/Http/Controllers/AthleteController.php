<?php
namespace App\Api\Http\Controllers;

use App\Api\Athletes\AthleteTransformer;
use App\Athletes\Athlete;
use App\Athletes\AthleteRepository;

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

    public function index()
    {
        $athletes = $this->athletes->findForUserPaginated($this->auth->user());

        return $this->response()->paginator($athletes, new AthleteTransformer());
    }

    public function show(Athlete $athlete)
    {
        return $this->response()->item($athlete, new AthleteTransformer());
    }

    public function delete(Athlete $athlete)
    {
        $this->athletes->delete($athlete);

        return $this->response()->noContent();
    }
}
