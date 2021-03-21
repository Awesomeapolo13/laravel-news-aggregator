<?php

namespace App\Http\Controllers;

use App\Services\SocialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Mockery\Exception;

class SocialiteController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function init()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    /**
     * @param SocialService $service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function callback(SocialService $service)
    {
        $user = Socialite::driver('vkontakte')->user();
        $authUser = $service->updateUser($user);
        if ($authUser) {
            return redirect()->route('account');
        }

        throw new \Exception('User not found');
    }
}
