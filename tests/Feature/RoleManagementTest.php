<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_role_model_validation()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->post('/roles', []);

        $response->assertSessionHasErrors(['name']);
    }

    public function test_role_model_update_feature()
    {
        $this->actingAs(User::factory()->create());

        $role = Role::factory()->create();

        $response = $this->put('/roles/' . $role->id, [
            'name' => 'Updated role name'
        ]);

        $this->assertDatabaseHas('roles', [
            'id' => $role->id,
            'name' => 'Updated role name',
        ]);

        $response->assertStatus(302);
    }

    public function test_role_model_delete_feature()
    {
        $this->actingAs(User::factory()->create());

        $role = Role::factory()->create();

        $response = $this->delete('/roles/' . $role->id);

        $response->assertRedirect('/')->assertStatus(302);
        $this->assertDatabaseMissing('roles', ['id' => $role->id]);
    }

    public function test_all_roles_are_shown_on_index_page()
    {
        $this->actingAs(User::factory()->create());

        $role = Role::factory()->create();

        $response = $this->get('/roles');

        $response->assertSee($role->name);
    }

    public function test_role_user_count_is_shown()
    {
        $this->actingAs(User::factory()->create());

        $role = Role::factory()->create();

        $response = $this->get('/roles');

        $response->assertSee(9);
    }

    public function test_role_user_count_is_shown_with_one_user()
    {
        $role = Role::create([
            'name' => 'Admin',
        ]);

        $user = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@mail.com',
            'role_id' => $role->id,
            'password' => bcrypt('password'),
        ]);

        $this->actingAs($user);

        $response = $this->get('/roles');

        $response->assertSee(1);
    }
}
