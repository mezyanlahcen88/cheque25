<?php

namespace Modules\User\App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\EmailService;
use Illuminate\Support\Carbon;
use Modules\User\App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailForgotPassword;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class CustomAuthController extends Controller
{
    public $emailService;
    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function showLogin()
    {
        addJavascriptFile('assets/js/custom/authentication/sign-in/general.js');

        return view('pages/auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendLogin(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $request->user()->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp(),
        ]);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function showForgotPassword()
    {
        addJavascriptFile('assets/js/custom/authentication/reset-password/reset-password.js');

        return view('pages/auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function sendEmailForgotPassword(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            // Generate the password reset token
        $token = Password::createToken($user);

        // Build the reset link
        $resetLink = url("reset-password/{$token}?email=" . urlencode($user->email));

        $this->emailForgotPassword($user->email,$resetLink);


        return response()->json(['status' => 'Password reset email sent successfully.']);
        } else {
            // Handle case when email is not found
            return response()->json(['error' => 'Email not found in the database.'], 404);
        }

        return false;
    }

    /**
     * Display the password reset view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function showResetPassword(Request $request)
    {
        addJavascriptFile('assets/js/custom/authentication/reset-password/new-password.js');

        return view('pages/auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function sendResetPassword(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );
        // dd(Password::PASSWORD_RESET, $status);
        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }



    public function emailForgotPassword(string $email,string $resetLink)
    {
        $data = [
            'resetLink' => $resetLink,
        ];
        $this->emailService->sendEmailForgotPassword($email, $data, getSettings()['sender_default_email'], getSettings()['sender_default_name']);
        return response()->json(['success' => true]);
    }
}
