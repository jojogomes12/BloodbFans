<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // Importe o facade Hash para usar o make() e check()

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_user()
    {
        // Dados do usuário a serem criados
        $userData = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => Hash::make('123456'), // Hasheando a senha usando o Laravel Hash facade
        ];

        // Criação do usuário usando a factory do Laravel
        $user = User::factory()->create($userData);

        // Asserts para verificar se o usuário foi criado corretamente
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('John Doe', $user->name);
        $this->assertTrue(Hash::check('123456', $user->password)); // Verifica se a senha coincide com o hash gerado
    }
}
