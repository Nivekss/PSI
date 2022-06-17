<?php

namespace App\Http\Controllers;
use App\Client;
use App\Http\Requests\Request;
use App\Project;
use App\Task;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class AdminController extends BaseController {

    /**
     * Takes you to the admin page of the app
     * @return mixed
     */
    public function index(){
        $users = User::all();
        $n_users = count($users);
        $n_tasks = Task::all()->count();
        $n_projects = Project::all()->count();
        $n_clients = Client::all()->count();

        return View::make('admin/index')
            ->with('pTitle', 'Admin')
            ->with('users', $users)
            ->with('n_users', $n_users)
            ->with('n_tasks', $n_tasks)
            ->with('n_projects', $n_projects)
            ->with('n_clients', $n_clients);
    }

// Register the user and start a new session
public function addUser(Request $request)
{	
    $email 		=	$request->input( 'email' );
    $password	=	$request->input( 'password' );

    // lets validate the users input
    $validator = Validator::make(
        array(
                'email' 	=>	$email,
                'password' 	=> 	$password
        ),
        array(
                'email'		=> 	'required|email|unique:users',
                'password'	=>	'required|min:8'
        )
    );

    if ($validator->fails()){
        return Redirect::back()->withErrors($validator)->withInput();
    }

    $user 				=	new User;
    $user->email 		=	$email;
    $user->password 	=	Hash::make($password);

    $user->save();	

    if ( Auth::attempt(array('email' => $email, 'password' => $password)) ) {
        Helpers::sendWelcomeMail();
        return Redirect::to('Dashboard');
    }
    return Redirect::back()->withErrors($validator);
}	
    public function storeUser(){

        User::create(Input::all());
        $id = \DB::getPdo()->lastInsertId();

        return $this->setStatusCode(200)->makeResponse('User created successfully', User::find($id));
    }
}