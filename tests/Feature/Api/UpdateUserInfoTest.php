<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Response;
use App\Models\User;

class UpdateUserInfoTest extends TestCase
{
   use DatabaseMigrations;

   /**
    * Return structure of json.
    *
    * @return array
    */
   public function jsonStructureGetProfile()
   {
       return [
           "result"=> [
               "id",
               "username",
               "full_name",
               "gender",
               "phone",
               "email",
               "created_at",
               "updated_at",
               "deleted_at",
           ],
           "code"
       ];
   }

   /**
    * Test status code
    *
    * @return void
    */
   public function test_get_user_info()
   {
       $this->jsonUser('GET', 'api/users/info',[], [])
           ->assertStatus(200)
           ->assertJsonStructure($this->jsonStructureGetProfile());
   }

    /**
    * Test check some object compare database.
    *
    * @return void
    */
   public function test_compare_database()
   {
       $responseProfie = $this->jsonUser('GET', 'api/users/info',[], []);
       $data = json_decode($responseProfie->getContent())->result;
       $arrayUser = [
           'id' => $data->id,
           'username' => $data->username,
           'email' => $data->email
       ];
       $this->assertDatabaseHas('users', $arrayUser);
   }
}
