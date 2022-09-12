<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

use App\Models\User as User;
use Illuminate\Support\Facades\Auth;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => 'required|same:password'
        ]);

        $user = User::find(Auth::id());
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect('/user')
            ->with('flash_notification.message', 'Votre mot de passe a bien été mise à jour')
            ->with('flash_notification.level', 'success');

    }
}
