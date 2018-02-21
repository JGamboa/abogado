<?php

use App\Models\Empresa;
use App\Repositories\EmpresaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmpresaRepositoryTest extends TestCase
{
    use MakeEmpresaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var EmpresaRepository
     */
    protected $empresaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->empresaRepo = App::make(EmpresaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateEmpresa()
    {
        $empresa = $this->fakeEmpresaData();
        $createdEmpresa = $this->empresaRepo->create($empresa);
        $createdEmpresa = $createdEmpresa->toArray();
        $this->assertArrayHasKey('id', $createdEmpresa);
        $this->assertNotNull($createdEmpresa['id'], 'Created Empresa must have id specified');
        $this->assertNotNull(Empresa::find($createdEmpresa['id']), 'Empresa with given id must be in DB');
        $this->assertModelData($empresa, $createdEmpresa);
    }

    /**
     * @test read
     */
    public function testReadEmpresa()
    {
        $empresa = $this->makeEmpresa();
        $dbEmpresa = $this->empresaRepo->find($empresa->id);
        $dbEmpresa = $dbEmpresa->toArray();
        $this->assertModelData($empresa->toArray(), $dbEmpresa);
    }

    /**
     * @test update
     */
    public function testUpdateEmpresa()
    {
        $empresa = $this->makeEmpresa();
        $fakeEmpresa = $this->fakeEmpresaData();
        $updatedEmpresa = $this->empresaRepo->update($fakeEmpresa, $empresa->id);
        $this->assertModelData($fakeEmpresa, $updatedEmpresa->toArray());
        $dbEmpresa = $this->empresaRepo->find($empresa->id);
        $this->assertModelData($fakeEmpresa, $dbEmpresa->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteEmpresa()
    {
        $empresa = $this->makeEmpresa();
        $resp = $this->empresaRepo->delete($empresa->id);
        $this->assertTrue($resp);
        $this->assertNull(Empresa::find($empresa->id), 'Empresa should not exist in DB');
    }
}
