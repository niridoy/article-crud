<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use Illuminate\Support\Str;

class ArticleTest extends TestCase
{
    use WithoutMiddleware, RefreshDatabase; // use the trait

    public function test_that_can_be_articles_showed()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/articles');
        $response->assertStatus(200);
    }

    public function test_that_can_be_a_article_showed()
    {
        $this->withoutExceptionHandling();
        $article = Article::factory()->create();
        $response = $this->get('/articles/'.$article->id );
        $response->assertStatus(200);
    }

    public function test_that_can_be_checked_article_datatable()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/articles/datatable');
        $response->assertStatus(200);
    }

    public function test_that_a_article_can_be_added()
    {
        $this->withoutExceptionHandling();
        $article = Article::factory()->make();
        $this->post('/articles',$article->toArray());
        $this->assertCount(1,Article::all());
    }

    public function test_that_a_article_can_be_updated()
    {
        $this->withoutExceptionHandling();
        $article = Article::factory()->create();
        $article->title = "Updated Title";
        $this->put('/articles/'.$article->id,$article->toArray());
        $this->assertDatabaseHas('articles',['id'=> $article->id , 'title' => 'Updated Title']);
    }

    public function test_that_a_article_can_be_deleted()
    {
        $this->withoutExceptionHandling();
        $article = Article::factory()->create();
        $this->delete('/articles/'.$article->id);
        $this->assertDatabaseMissing('articles',['id'=> $article->id ]);
    }
}
