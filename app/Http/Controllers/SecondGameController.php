<?php

namespace App\Http\Controllers;

use App\Models\Players;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Throwable;

/**
 * Class SecondGameController
 * @package App\Http\Controllers
 */
class SecondGameController extends Controller
{

    /**
     * Constructor to BanksController.
     *
     */
    public function __construct() {}

    /**
     * Show index view from model.
     *
     * @return Application|Factory|JsonResponse|View
     */
    public function index()
    {
        return view('second_game.index');
    }

    /**
     * Show index view from model.
     *
     * @return Application|Factory|JsonResponse|View
     */
    public function showModal()
    {
        return view('second_game.show_modal');
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
            return view('second_game.show_modal', [
                'errorMsg' => 'Alias ya usado anteriormente'
            ]);
        } else {
            $player = Players::create($data);
            return view('second_game.index', [
                'player' => $player
            ]);
        }
    }
}
