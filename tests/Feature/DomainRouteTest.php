<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class DomainRouteTest extends TestCase
{
    use RefreshDatabase;

    protected $domain;
    protected $id;

    protected function setUp(): void
    {
        parent::setUp();
        $faker = Factory::create();

        $this->domain = $faker->domainName();
        //print_r($this->domain."\n");
        $this->id = DB::table('domains')->insertGetId([
            'name' => $this->domain,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('url_checks')->insert([
            'url_id' => $this->id,
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
        $response->assertSeeText($this->domain);
    }

    public function testRouteShow()
    {
        $response = $this->get(route('domains.show', $this->id));
        $response->assertStatus(200);
        $response->assertSeeText($this->domain);
    }

    public function testRouteStore()
    {
        $faker = Factory::create();
        $response = $this->post(route('domains.store'), ['domain' => ['name' => $faker->domainName()]]);
        $response->assertStatus(302);
        //$response->assertSeeText("The domain.name format is invalid");
    }

    public function testRouteStore2()
    {
        $faker = Factory::create();
        $domainName = $faker->domainName();
        $response = $this->post(route('domains.store'), ['domain' => ['name' => "http://" . $domainName]]);
        //print_r($domainName."\n");
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('domains', ['name' => $this->domain]);
        $this->assertDatabaseHas('domains', ['name' => $domainName]);
    }
}
