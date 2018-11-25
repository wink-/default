<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\UserAction;
use Illuminate\Support\Facades\Gate;

class UserActionsController extends Controller
{
    /**
     * Display a listing of UserAction.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('user_action_access')) {
            return abort(401);
        }

        $user_actions = UserAction::all();

        return view('admin.user_actions.index', compact('user_actions'));
    }
}
