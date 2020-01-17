<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Http\Requests\UsuarioRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param Usuario $model
     * @return View
     */
    public function index(Usuario $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param UsuarioRequest $request
     * @param Usuario $model
     * @return RedirectResponse
     */
    public function store(UsuarioRequest $request, Usuario $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('user.index')->withStatus(__('Usuario successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param Usuario $user
     * @return View
     */
    public function edit(Usuario $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param UsuarioRequest $request
     * @param Usuario $user
     * @return RedirectResponse
     */
    public function update(UsuarioRequest $request, Usuario $user)
    {
        $hasPassword = $request->get('password');
        $user->update(
            $request->merge([
                'password' => Hash::make($request->get('password'))
            ])->except([$hasPassword ? '' : 'password'])
        );

        return redirect()->route('user.index')->withStatus(__('Usuario successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param Usuario $user
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Usuario $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('Usuario successfully deleted.'));
    }
}
