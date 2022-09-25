<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Proyecto;
use Tests\TestCase;
//use PHPUnit\Framework\TestCase;

class ProyectoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_example_index()
    {
        $response = $this->get('/proyectos');
        $response->assertStatus(200);
        //$response->ddHeaders(); 
        //$response->ddSession();
        //$response->dd();
        //$this->assertTrue(true);
    }

    public function test_example_create()
    {
        $response = $this->get('/proyectos/create');
        $response->assertStatus(200);
    }

    public function test_example_store()
    {
        //$this->actingAs(\App\Models\User::factory(1)->create());
        // $proyecto = factory('App\Models\Proyecto')->make();
        // $this->post('/proyectos',$proyecto->toArray());
        // $this->assertEquals(1,Proyecto::all()->count());

        $proyecto = [
            'nombre' => "test nombre 8",
            'descripcion'  => "test descripcion 8",   
        ];

        // $proyecto=Proyecto::make([
        //     'nombre' => "test nombre 6",
        //     'descripcion'  => "test descripcion 6",   
        // ]);

        $response = $this->post('/proyectos', $proyecto);
        $response->assertRedirect('/proyectos');
        
        //$this->assertEquals(1,Proyecto::all()->count());
        
        // $response->assertStatus(200);
        
        //$response = $this->call('POST', '/proyectos', $test_post);
        //$response = $this->actingAs($user)->post('/admin/posts', $test_post);
        //$response->assertStatus(200);

        //$this->assertTrue(true);

    }

    public function test_example_delete()
    {
        $proyecto= Proyecto::factory()->count(1)->make();

        $proyecto= Proyecto::first();

        if($proyecto){
            $proyecto->delete();
        }

        $this->assertTrue(true);
    }
}
