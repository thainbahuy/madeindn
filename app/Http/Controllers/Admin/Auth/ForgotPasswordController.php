<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendMailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Password;
use Session;

class ForgotPasswordController extends Controller
{

    //use SendsPasswordResetEmails;


    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('admin/Auth/forgotpass');
    }

    /**
     * Validate the email for the given request.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

    }

    /**
     * Get the needed authentication credentials from the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only('email');
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }

    /**
     * Send a reset link to the given user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
        $user = $this->broker()->getUser($this->credentials($request));
        if ($user != null) {
            $token = $this->broker()->createToken($user);
            $email = $request->get('email');
            $Job = (new SendMailJob('mailResetPassword', array('token' => $token, 'mail' => $email), 'Forgot Password',
                'madeindn.system@gmail.com', 'MadeinDN team', $email))->delay(60 * 0.5);;
            $this->dispatch($Job);
            return redirect()->back()->with('success', 'We sent link reset password to your email');
        } else {
            return redirect()->back()->withErrors(['This email not exist !']);
        }

    }
}
