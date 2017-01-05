<?php
namespace App\Http\Controllers;

use App\Plans\PlanRepository;

class HomeController extends Controller
{
    /**
     * @var \App\Plans\PlanRepository
     */
    private $plans;

    public function __construct(PlanRepository $plans)
    {
        $this->plans = $plans;
    }

    public function index()
    {
        $plans = $this->plans->all();

        return view('home.index', compact('plans'));
    }
}
