<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $faker = Factory::create();
        
        $domain = "http://".$faker->domainName();
        //print_r($domain);
        DB::table('domains')->insertGetId([
            'name' => $domain,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function testMainPage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testRouteIndex()
    {
        $response = $this->get(route('domains.index'));
        $response->assertStatus(200);
    }


/** 
*    protected function setUp(): void
*   {
*    parent::setUp();
*        DB::table('domains')->count(2)->make();
*    }
    */
}
