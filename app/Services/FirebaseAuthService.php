<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FirebaseAuthService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = env('FIREBASE_API_KEY');
        $this->baseUrl = "https://identitytoolkit.googleapis.com/v1";
    }

    public function signInWithEmailPassword($email, $password)
    {
        $url = "{$this->baseUrl}/accounts:signInWithPassword?key={$this->apiKey}";

        $response = Http::post($url, [
            'email' => $email,
            'password' => $password,
            'returnSecureToken' => true
        ]);

        if ($response->successful()) {
            return $response->json();
        } else {
            throw new \Exception($response->json()['error']['message']);
        }
    }

    public function signUpWithEmailPassword($email, $password)
{
    $url = "{$this->baseUrl}/accounts:signUp?key={$this->apiKey}";

    $response = Http::post($url, [
        'email' => $email,
        'password' => $password,
        'returnSecureToken' => true
    ]);

    if ($response->successful()) {
        return $response->json();
    } else {
        throw new \Exception($response->json()['error']['message']);
    }
}

}
