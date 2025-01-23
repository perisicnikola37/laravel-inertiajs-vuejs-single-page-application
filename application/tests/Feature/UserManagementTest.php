<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_user_model_validation()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->post('/users', []);

        $response->assertSessionHasErrors(['name', 'email', 'password', 'avatar']);
    }

    public function test_user_model_update_feature()
    {
        $this->actingAs(User::factory()->create());

        $user = User::factory()->create();

        $response = $this->put('/users/' . $user->id, [
            'name' => 'John Doe',
            'email' => 'updated@mail.com'
        ]);

        $this->assertDatabaseHas(
            'users',
            [
                'id' => $user->id,
                'name' => 'John Doe',
                'email' => 'updated@mail.com'
            ]
        );

        $response->assertStatus(302);
    }

    public function test_user_model_delete_feature()
    {
        $this->actingAs(User::factory()->create());

        $user = User::factory()->create();

        $response = $this->delete('/users/' . $user->id);

        $response->assertRedirect('/')->assertStatus(302);
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function test_user_model_delete_feature_with_invalid_id()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->withHeaders(['X-CSRF-TOKEN' => ''])
            ->delete('/users/999');

        $response->assertStatus(302);
    }

    public function test_all_users_are_shown_on_index_page()
    {
        $this->actingAs(User::factory()->create());

        $user = User::factory()->create();

        $response = $this->get('/users');

        $response->assertSee($user->name);
    }

    public function test_user_creation_date_is_in_valid_format()
    {
        $this->actingAs(User::factory()->create());

        $user = User::factory()->create();

        $response = $this->get('/users');

        $response->assertSee($user->created_at->format('d M Y'));
    }

    public function test_user_search_feature_on_index_page()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->get('/users?term=Admin');
        $response2 = $this->get('/users?term=something');

        $response->assertSee('Admin');
        $response2->assertDontSee('Admin');
    }

    public function test_user_create_page_contains_necessary_input_fields()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->get('/users/create');

        $response->assertSee('name');
        $response->assertSee('email');
        $response->assertSee('password');
        $response->assertSee('avatar');
    }

    public function test_user_logout_feature()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post('/logout');

        $response->assertRedirect('/');
    }
}
