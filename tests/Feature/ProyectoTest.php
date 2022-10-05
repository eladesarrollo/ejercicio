<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Str;
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

        $proyectos=Proyecto::latest('updated_at')->paginate();
        $response->assertViewIs('proyectos.index');
        $response->assertViewHas('proyectos',$proyectos);
    }

    public function test_example_show(){
        $proyecto=Proyecto::first();

        $response = $this->get('/proyectos/'.$proyecto->id);

        $response->assertStatus(200);

        $this->assertEquals('Garth Romaguera III',$proyecto->nombre);

    }

    public function test_example_create()
    {
        $response = $this->get('/proyectos/create');
        $response->assertStatus(200);
        $response->assertViewIs('proyectos.create');
    }

    public function test_example_store()
    {
        $this->withoutExceptionHandling();
        $proyecto = [
            'nombre' =>  Str::random(20),
            'descripcion'  => "TEST",   
        ];

        $response = $this->post('/proyectos', $proyecto);
        $response->assertRedirect('/proyectos');
        //$this->assertCount(1,Proyecto::all());

        //var_dump($proyecto['nombre']);
        $proyectoDB=Proyecto::where("nombre","=", $proyecto['nombre'])->get();
        //var_dump($proyectoDB->count());
        //$this->assertEquals($proyecto['nombre'],$proyectoDB->nombre);
        $this->assertTrue($proyectoDB->count()>0);
        
        // $response->assertStatus(200);        
        //$response = $this->call('POST', '/proyectos', $test_post);
        //$response = $this->actingAs($user)->post('/admin/posts', $test_post);
        //$response->assertStatus(200);

        //$this->assertTrue(true);

    }

    public function test_example_update(){
        $proyecto= Proyecto::factory()->create();

        //$proyecto= Proyecto::factory()->create(['descripcion' => "TEST"]);

        $proyectoModificado = [
            'nombre' =>  "MODIFICADO6",
            'descripcion'  => "TEST",   
        ];

        if($proyecto){
            $response=$this->put('/proyectos/'.$proyecto->id,$proyectoModificado);
            $response->assertRedirect('/proyectos?'.$proyecto->id);
        }

        $proyecto = $proyecto->fresh();
        
        $this->assertEquals('MODIFICADO6',$proyecto->nombre);

        $this->assertTrue(true);
    }

    public function test_example_delete()
    {
        $proyecto= Proyecto::factory()->create();

        //$proyecto= Proyecto::first();

        if($proyecto){
            $response = $this->delete('/proyectos/'.$proyecto->id);
            $response->assertRedirect('/proyectos');
        }
       
    }

    public function test_proyecto_nombre_es_requerido(){
        
        //$this->withoutExceptionHandling();
        
        $proyecto = [
            'nombre' =>  '',
            'descripcion'  => "TEST",   
        ];

        $response = $this->post('/proyectos', $proyecto);        

        $response->assertSessionHasErrors(['nombre']);
    }
}
