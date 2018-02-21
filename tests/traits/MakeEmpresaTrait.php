<?php

use Faker\Factory as Faker;
use App\Models\Empresa;
use App\Repositories\EmpresaRepository;

trait MakeEmpresaTrait
{
    /**
     * Create fake instance of Empresa and save it in database
     *
     * @param array $empresaFields
     * @return Empresa
     */
    public function makeEmpresa($empresaFields = [])
    {
        /** @var EmpresaRepository $empresaRepo */
        $empresaRepo = App::make(EmpresaRepository::class);
        $theme = $this->fakeEmpresaData($empresaFields);
        return $empresaRepo->create($theme);
    }

    /**
     * Get fake instance of Empresa
     *
     * @param array $empresaFields
     * @return Empresa
     */
    public function fakeEmpresa($empresaFields = [])
    {
        return new Empresa($this->fakeEmpresaData($empresaFields));
    }

    /**
     * Get fake data of Empresa
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEmpresaData($empresaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'rut' => $fake->word,
            'razon_social' => $fake->word,
            'nombre_fantasia' => $fake->word,
            'direccion' => $fake->word,
            'comunas_id' => $fake->randomDigitNotNull,
            'provincias_id' => $fake->randomDigitNotNull,
            'logotipo' => $fake->word,
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $empresaFields);
    }
}
