<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;

class LoginTest extends TestCase
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
  public function jsonStructureLoginSuccess()
  {
    return [
      'result' => [
        'token',
        'user' => [
            'id',
            'username',
            'full_name',
            'birthday',
            'gender',
            'phone',
            'email',
            'created_at',
            'updated_at',
            'deleted_at',
        ]
      ],
      'code'
    ];
  }

  /**
  * Test structure of json response.
  *
  * @return void
  */
  public function testJsonLoginSuccess()
  {
    $body = [
        'username' => $this->user->username,
        'password' => '12345'
    ];
    $this->jsonUser('POST', '/api/login', $body, ['Accept' => 'application/json'])
        ->assertStatus(200)
        ->assertJsonStructure($this->jsonStructureLoginSuccess());
  }

  /**
  * Test structure of json response.
  *
  * @return void
  */
  public function testJsonLoginFail()
  {
    $body = [
      'username' => $this->user->username,
      'password' => 'hienpham'
    ];
    $this->jsonUser('POST', '/api/login', $body, ['Accept' => 'application/json'])
        ->assertStatus(401)
        ->assertJsonStructure([
          "error",
          "code"
    ]);
  }

  /**
  * Test structure of json response.
  *
  * @return void
  */
  public function testJsonLogoutSuccess()
  {
    $this->jsonUser('POST', 'api/logout')
        ->assertStatus(204);
  }
}
