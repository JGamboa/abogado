<?php
namespace App\Traits;

trait OnSaveEmpresa
{

    public function save(array $options = array())
    {
        if( ! $this->empresa_id)
        {
            $this->empresa_id = session('empresa_id');
        }

        parent::save($options);
    }

}