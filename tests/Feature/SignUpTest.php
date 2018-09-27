<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Hash;

class SignUpTest extends TestCase
{

    use RefreshDatabase;
    /**
     * Testear que la ruta de registro que es
     * la que muestra la vista (el formulario)
     * existe.
     *
     * @return void
     */
    public function testSignUpGet()
    {
        $response = $this->get('register');
        $response->assertStatus(200);
    }

    /**
     *
     * @return void
     */
    public function testSignUpPost()
    {
        $response = $this->post('register', [
            'name' => 'Jon doe',
            'email' => 'jondoe@gmail.com',
            'password' => Hash::make('123'),
        ]);
        
        $response->assertStatus(302);
    }
}
