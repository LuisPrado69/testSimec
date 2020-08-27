<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Players;

/**
 * Class FirstGameController
 * @package App\Http\Controllers
 */
class FirstGameController extends Controller
{

    /**
     * Constructor to BanksController.
     *
     */
    public function __construct()
    {
    }

    /**
     * Show index view from model.
     *
     * @return Application|Factory|JsonResponse|View
     */
    public function index()
    {
        return view('first_game.index');
    }

    /**
     * Show index view from model.
     *
     * @return Application|Factory|JsonResponse|View
     */
    public function showModal()
    {
        return view('first_game.show_modal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Factory|Response|View
     */
    public function store(Request $request)
    {
        $request->validate([
            'alias' => 'required'
        ]);
        $data = $request->all();
        $exist = Players::where('alias', $data['alias'])->first();
        if ($exist) {
            return view('first_game.show_modal', [
                'errorMsg' => 'Alias ya usado anteriormente'
            ]);
        } else {
            $player = Players::create($data);
            return view('first_game.index', [
                'player' => $player
            ]);
        }
    }
}
