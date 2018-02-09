<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Laracast\Flash\Flash;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::orderBy('id','ASC')->paginate(6);
        return view('admin.users.index')->with('users',$users);
/*
        $users = DB::select('select * from users');
        var_dump($users);
*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $user = new User($request->all());
            $user->password = bcrypt($request->password);
            if( $user->save()){
                flash("Se ha registrado  de forma exitosa")->success();
                return redirect()->route('users.index');
            }
            else{
                flash("Error al generar usuario")->error();
                return redirect()->route('users.index');
            }
        } catch (Exception $e) {
            flash("Error al generar usuario")->error();
            return redirect()->route('users.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        ( $user->save())? flash("Usuario {$user->name} actualizado correctamente")->success() : flash('Error al borrar usuario')->warning();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if( $user->delete()){
            flash('Usuario '.$user->name.' borrado correctamente')->warning();
            return redirect()->route('users.index');
        }else{
            flash('Error al borrar usuario')->warning();
            return redirect()->route('users.index');
        }
    }
}
