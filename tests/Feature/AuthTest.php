<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
   
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

    public function test_login_false(){

        $user = User::first();
        $credenciais = [
            'email' =>$user->email,
            'password' => 'teste123',
        ];
        $response = $this->post('api/login', $credenciais);
        $response->assertStatus(401);
    }

    public function test_login_sem_dados(){

        $user = User::first();
        $credenciais = [];
        $response = $this->post('api/login', $credenciais);
        $response->assertStatus(422);
        $dados = json_decode($response->getContent(), true);
        $this->assertArrayHasKey('email',$dados);
        $this->assertArrayHasKey('password',$dados);

    }
}
