<?php

namespace Tests\Browser;

use Ergare17\Articles\Models\Article;
use Faker\Factory;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ArticlesTest extends DuskTestCase
{

    use DatabaseMigrations;

    /**
     * @test
     */
    public function create_url_show_a_form()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/articles/create')
                ->assertSee('Create Article')
                ->assertVisible('input#title')
                ->assertVisible('textarea#description')
                ->assertInputValue('input#title','')
                ->assertInputValue('textarea#description','')
                ->pause(3000);
        });
    }

    /**
     * @test
     */
    public function edit_url_show_a_form()
    {
        $article = factory(Article::class)->create();

        $this->browse(function (Browser $browser) use ($article) {
            $browser->visit('/articles/edit/'.$article->id)
                ->assertSee('Edit Article')
                ->assertVisible('input#title')
                ->assertVisible('textarea#description')
                ->assertInputValue('input#title',$article->title)
                ->assertInputValue('textarea#description',$article->description)
                ->pause(3000);
        });
    }

    /**
     * @test
     */
    public function an_user_can_create_an_article()
    {
        $faker = Factory::create();

        $this->browse(function (Browser $browser) use ($faker){
            $browser->visit('/articles/create')
                ->type('title', $faker->sentence())
                ->type('description', $faker->paragraph())
                ->press('Create')
                ->assertSee('Created ok!')
                ->pause(3000);
        });
    }

    /**
     * @group failing
     * @test
     */
    public function an_user_can_edit_an_article()
    {
        $article = factory(Article::class)->create();

        $faker = Factory::create();

        $this->browse(function (Browser $browser) use ($faker){
            $browser->visit('/articles/create')
                ->type('title', $faker->sentence())
                ->type('description', $faker->paragraph())
                ->press('Update')
                ->assertSee('Created ok!')
                ->pause(3000);
        });
    }
}
