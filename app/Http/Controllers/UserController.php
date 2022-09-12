<?php namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User as User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Constructor method
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['edit', 'update']]);
    }

    public function store(UserRequest $request)
    {
        User::create([
            'name'      => $request->get('name'),
            'email'     => $request->get('email'),
            'password'  => bcrypt($request->get('password'))
        ]);

        return redirect('/login')
            ->with('flash_notification.message', 'Votre compte a bien été crée')
            ->with('flash_notification.level', 'success');
        
    }

    public function edit()
    {
        $user = User::find(Auth::id());
        return view('profile',[
            'user'=>$user
            ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required'
        ]);
        $user = User::find(Auth::id());

        $user->name     = $request->get('name');
        $user->email    = $request->get('email');
        $user->save();

        return redirect('/tasks')
            ->with('flash_notification.message', 'Votre profil a bien été mise à jour')
            ->with('flash_notification.level', 'success');
    }

}
