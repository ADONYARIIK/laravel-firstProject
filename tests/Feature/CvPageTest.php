<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CvPageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_cv_page_is_accessible(): void
    {
        $response = $this->get('/cv');

        $response
            ->assertOk()
            ->assertSee('Professional Summary')
            ->assertSee('Work Experience')
            ->assertSee('Education')
            ->assertSee('Projects');
    }
}
