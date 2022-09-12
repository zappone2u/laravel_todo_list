<?php

use App\Models\User;
use App\Models\Tasks;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TasksTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSeeTodoList()
    {
        $this->visit('/tasks')
            ->see('Tâche');
    }

    public function testSeeAddTasksFrom()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $this->visit('/tasks')
            ->click('Nouvelle tâche')
            ->seePageIs('/newtask')
            ->see('Création de votre tâche');
    }

    public function testAddTodo()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $this->visit('/tasks')
            ->type('test1', 'name')
            ->press('Créer')
            ->seePageIs('/todo')
            ->see('New todo created successfully')
            ->seeInDatabase('todos', ['name' => 'A New Todo']);
    }

}
