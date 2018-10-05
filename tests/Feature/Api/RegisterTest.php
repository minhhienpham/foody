<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends TestCase
{
    use DatabaseMigrations;
    /**
    * Set up database
    *
    * @return void
    */
    public function setUp()
    {
        parent::setUp();
    }
    /**
    * Return structure of json.
    *
    * @return array
    */
    public function jsonStructureRegisterFail()
    {
        return [
            'error' => [
                'username',
                'email'
            ],
            'code'
        ];
    }
    /**
    * Return structure of json.
    *
    * @return array
    */
    public function jsonStructureRegisterSuccess()
    {
        return [
            'result' => [
                'token',
                'user'=> [
                    'username',
                    'full_name',
                    'phone',
                    'email',
                    'gender',
                    'birthday',
                    'role_id',
                    'updated_at',
                    'created_at',
                    'id',
                ],
            ],
            'code'
          ];
    }
    /**
     * Test structure of json response.
     *
     * @return void
     */
    public function testJsonRegisterFail()
    {
        $body = [
            'username' => $this->user->username,
            'full_name' => $this->user->full_name,
            'birthday' => $this->user->birthday,
            'password' => '12345678',
            'gender' => $this->user->gender,
            'phone' => $this->user->phone,
            'email' => $this->user->email,
            'role_id' => $this->user->role_id,
        ];
        $this->jsonUser('POST', '/api/register', $body, ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJsonStructure($this->jsonStructureRegisterFail());
    }
    /**
     * Test structure of json response.
     *
     * @return void
     */
    public function testJsonRegisterSuccess()
    {
        $body = [
            'username' => 'lebavy',
            'full_name' => 'Le Ba Vy',
            'birthday' => '1996-11-16',
            'password' => '12345678',
            'gender' => 1,
            'phone' => '01652638375',
            'email' => 'lebavy1611@gmail.com',
            'role_id' => 3,
        ];
        $response = $this->jsonUser('POST', '/api/register', $body, ['Accept' => 'application/json']);
        $response->assertStatus(200)
                ->assertJsonStructure($this->jsonStructureRegisterSuccess());
        $data = json_decode($response->getContent())->result->user;
        $userCompare = [
            'username' => $data->username,
            'full_name' => $data->full_name,
            'birthday' => $data->birthday,
            'gender' => $data->gender,
            'phone' => $data->phone,
            'email' => $data->email,
            'role_id' => $data->role_id,
        ];
        $this->assertDatabaseHas('users', $userCompare);
    }
}
