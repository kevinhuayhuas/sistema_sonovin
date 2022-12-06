<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Dominio;

class ProjectTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /** @test */
    public function registrarProducto(){
        //deshabilitar las excepciones
        $this->withoutExceptionHandling();
        $response= $this->post("/guardarproducto",[
            'nombre' => 'Casaca de cuero',
            'descripcion' => '100 cuero'
        ]);
        $response->assertOk();

    }

    /** @test */
    public function listarDominios(){
        $response= $this->get('/dominios');
        $response->assertOk();
       
    }
    /** @test */
    public function listarClientes(){
        $response= $this->get('/clientes');
        $response->assertOk();
    }

}
