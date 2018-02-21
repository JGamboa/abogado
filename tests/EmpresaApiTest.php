<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmpresaApiTest extends TestCase
{
    use MakeEmpresaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEmpresa()
    {
        $empresa = $this->fakeEmpresaData();
        $this->json('POST', '/api/v1/empresas', $empresa);

        $this->assertApiResponse($empresa);
    }

    /**
     * @test
     */
    public function testReadEmpresa()
    {
        $empresa = $this->makeEmpresa();
        $this->json('GET', '/api/v1/empresas/'.$empresa->id);

        $this->assertApiResponse($empresa->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEmpresa()
    {
        $empresa = $this->makeEmpresa();
        $editedEmpresa = $this->fakeEmpresaData();

        $this->json('PUT', '/api/v1/empresas/'.$empresa->id, $editedEmpresa);

        $this->assertApiResponse($editedEmpresa);
    }

    /**
     * @test
     */
    public function testDeleteEmpresa()
    {
        $empresa = $this->makeEmpresa();
        $this->json('DELETE', '/api/v1/empresas/'.$empresa->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/empresas/'.$empresa->id);

        $this->assertResponseStatus(404);
    }
}
