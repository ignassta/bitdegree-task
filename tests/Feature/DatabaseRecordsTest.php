<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTableTest extends TestCase
{
    /**
     * Check if there are any records in database
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertDatabaseHas('badges', [
            'id' => true
        ]);

        $this->assertDatabaseHas('courses', [
            'id' => true
        ]);

        $this->assertDatabaseHas('groups', [
            'id' => true
        ]);

        $this->assertDatabaseHas('lecturers', [
            'id' => true
        ]);

        $this->assertDatabaseHas('users', [
            'id' => true
        ]);
    }
}
