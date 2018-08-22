<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;
use Illuminate\Http\Request;
class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                $email;
                if ($providerUser->getEmail() == null) {
                    $email = "No Email";
                }else{
                    $email = $providerUser->getEmail();
                }

                $user = User::create([
                    'email' => $email,
                    'name' => $providerUser->getName(),
                    'facebook_id' => $providerUser->getId(),
                    'created_ip' => \Request::ip(),
                    'password' => md5(rand(1,10000)),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}
