<?php declare(strict_types=1);


namespace App\Services;


use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialService
{
    public function updateUser($user)
    {
//        dd($user);

        $email = $user->getEmail();
        $authUser = User::where('email', $email)->first();
        if ($authUser) {
            Auth::login($authUser);
            $authUser->name = $user->getName();
            $authUser->avatar = $user->getAvatar();

            return $authUser->save();
        }

        return null;
    }
}
