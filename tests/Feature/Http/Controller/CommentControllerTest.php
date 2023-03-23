<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSuccessStatus(): void
    {
        $response = $this->get(route('comment.index'));

        $response->assertStatus(200);
    }

    public function testCreateSuccessStatus(): void
    {
        $response = $this->get(route('comment.create'));

        $response->assertStatus(200);
    }

    public function testCreateSaveSuccessData(): void
    {
        $data = [
            'username' => \fake()->userName(),
            'comment' => \fake()->text(100),
        ];

        $response = $this->post(route('comment.store'), $data);
        $response->assertStatus(200)
            ->json($data);
    }

    public function testValidateUsernameData(): void
    {
        $data = [
            'username' => \fake()->userName(),
        ];

        $response = $this->post(route('admin.news.store'), $data);
        $response->assertRedirect('http://localhost');
    }

    public function testValidateCommentData(): void
    {
        $data = [
            'comment' => \fake()->text(100),
        ];
        $response = $this->post(route('admin.news.store'), $data);
        $response->assertRedirect('http://localhost');
    }
}
