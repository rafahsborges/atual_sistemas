<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Http\Requests\UsuarioRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @return View
     */
    public function index()
    {
        $usuarios = (new Usuario)->withTrashed()->paginate(15);
        return view('usuarios.index', ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return View
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        Usuario::create($request->all());

        return redirect()->route('usuario.index')
            ->with('success', 'Usuário created successfully.');
    }

    /**
     * Store a newly created user in storage
     *
     * @param UsuarioRequest $request
     * @param Usuario $model
     * @return RedirectResponse
     */
    /*public function store(UsuarioRequest $request, Usuario $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('usuario.index')->withStatus(__('Usuario successfully created.'));
    }*/

    /**
     * Show the form for editing the specified user
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $usuario = (new Usuario)->withTrashed()->find($id);
        return view('usuarios.edit', ['usuario' => $usuario]);
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

        return redirect()->route('usuario.index')->withStatus(__('Usuario successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy($id)
    {
        $usuario = (new Usuario())->findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuario.index')->withStatus(__('Usuario successfully deleted.'));
    }
}
