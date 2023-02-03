<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controller\Admin;

use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSuccessStatus(): void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function testCreateSuccessStatus(): void
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function testCreateSaveSuccessData(): void
    {
        $news = News::factory()->create();

        $response = $this->post(route('admin.news.store'), $news);
        $response->assertStatus(200);
    }

    public function testValidateTitleData(): void
    {
        $data = [
            'description' => \fake()->text(100),
            'author' => \fake()->userName(),
        ];

        $response = $this->post(route('admin.news.store'), $data);
        $response->assertRedirect('http://localhost');
    }

}
