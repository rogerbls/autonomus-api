<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_login_true()
    {
        $user = User::first();
        $credenciais = [
            'email' =>$user->email,
            'password' => 'password',
        ];
        $response = $this->post('api/login', $credenciais);
        $response->assertStatus(200);
    }
}
