<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class DomainChecksRouteTest extends TestCase
{
    use RefreshDatabase;

    protected $domain;
    protected $id;

    protected function setUp(): void
    {
        parent::setUp();
        $faker = Factory::create();
        $this->domain = $faker->domainName();

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

    public function testRouteStore()
    {
        $response = $this->post(route('domains.checks.store', $this->id));
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('url_checks', ['url_id' => $this->id]);
    }
}
