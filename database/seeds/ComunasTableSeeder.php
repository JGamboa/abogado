<?php

use Illuminate\Database\Seeder;
use App\Models\Comuna;
use Carbon\Carbon;

class ComunasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Comuna::insert([
            [
                'nombre' => 'Iquique','provincia_id'=> 3, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Alto Hospicio','provincia_id'=> 3, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Pozo Almonte','provincia_id'=> 4, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Camiña','provincia_id'=> 4, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Colchane','provincia_id'=> 4, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Huara','provincia_id'=> 4, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Pica','provincia_id'=> 4, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Antofagasta','provincia_id'=> 5, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Mejillones','provincia_id'=> 5, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Sierra Gorda','provincia_id'=> 5, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Taltal','provincia_id'=> 5, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Calama','provincia_id'=> 6, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Ollagüe','provincia_id'=> 6, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Pedro de Atacama','provincia_id'=> 6, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Tocopilla','provincia_id'=> 7, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'María Elena','provincia_id'=> 7, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Copiapó','provincia_id'=> 8, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Caldera','provincia_id'=> 8, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Tierra Amarilla','provincia_id'=> 8, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Chañaral','provincia_id'=> 9, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Diego de Almagro','provincia_id'=> 9, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Vallenar','provincia_id'=> 10, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Alto del Carmen','provincia_id'=> 10, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Freirina','provincia_id'=> 10, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Huasco','provincia_id'=> 10, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'La Serena','provincia_id'=> 11, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Coquimbo','provincia_id'=> 11, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Andacollo','provincia_id'=> 11, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'La Higuera','provincia_id'=> 11, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Paihuano','provincia_id'=> 11, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Vicuña','provincia_id'=> 11, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Illapel','provincia_id'=> 12, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Canela','provincia_id'=> 12, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Los Vilos','provincia_id'=> 12, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Salamanca','provincia_id'=> 12, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Ovalle','provincia_id'=> 13, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Combarbalá','provincia_id'=> 13, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Monte Patria','provincia_id'=> 13, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Punitaqui','provincia_id'=> 13, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Río Hurtado','provincia_id'=> 13, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Valparaíso','provincia_id'=> 14, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Casablanca','provincia_id'=> 14, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Concón','provincia_id'=> 14, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Juan Fernández','provincia_id'=> 14, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Puchuncaví','provincia_id'=> 14, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Quintero','provincia_id'=> 14, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Viña del Mar','provincia_id'=> 14, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Isla de Pascua','provincia_id'=> 15, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Los Andes','provincia_id'=> 16, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Calle Larga','provincia_id'=> 16, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Rinconada','provincia_id'=> 16, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Esteban','provincia_id'=> 16, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'La Ligua','provincia_id'=> 17, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Cabildo','provincia_id'=> 17, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Papudo','provincia_id'=> 17, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Petorca','provincia_id'=> 17, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Zapallar','provincia_id'=> 17, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Quillota','provincia_id'=> 18, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'La Calera','provincia_id'=> 18, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Hijuelas','provincia_id'=> 18, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'La Cruz','provincia_id'=> 18, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Nogales','provincia_id'=> 18, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Antonio','provincia_id'=> 19, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Algarrobo','provincia_id'=> 19, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Cartagena','provincia_id'=> 19, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'El Quisco','provincia_id'=> 19, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'El Tabo','provincia_id'=> 19, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Santo Domingo','provincia_id'=> 19, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Felipe','provincia_id'=> 20, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Catemu','provincia_id'=> 20, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Llay Llay','provincia_id'=> 20, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Panquehue','provincia_id'=> 20, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Putaendo','provincia_id'=> 20, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Santa María','provincia_id'=> 20, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Quilpué','provincia_id'=> 21, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Limache','provincia_id'=> 21, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Olmué','provincia_id'=> 21, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Villa Alemana','provincia_id'=> 21, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Rancagua','provincia_id'=> 22, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Codegua','provincia_id'=> 22, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Coinco','provincia_id'=> 22, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Coltauco','provincia_id'=> 22, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Doñihue','provincia_id'=> 22, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Graneros','provincia_id'=> 22, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Las Cabras','provincia_id'=> 22, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Machalí','provincia_id'=> 22, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Malloa','provincia_id'=> 22, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Mostazal','provincia_id'=> 22, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Olivar','provincia_id'=> 22, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Peumo','provincia_id'=> 22, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Pichidegua','provincia_id'=> 22, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Quinta de Tilcoco','provincia_id'=> 22, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Rengo','provincia_id'=> 22, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Requínoa','provincia_id'=> 22, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Vicente','provincia_id'=> 22, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Pichilemu','provincia_id'=> 23, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'La Estrella','provincia_id'=> 23, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Litueche','provincia_id'=> 23, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Marchihue','provincia_id'=> 23, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Navidad','provincia_id'=> 23, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Paredones','provincia_id'=> 23, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Fernando','provincia_id'=> 24, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Chépica','provincia_id'=> 24, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Chimbarongo','provincia_id'=> 24, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Lolol','provincia_id'=> 24, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Nancagua','provincia_id'=> 24, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Palmilla','provincia_id'=> 24, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Peralillo','provincia_id'=> 24, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Placilla','provincia_id'=> 24, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Pumanque','provincia_id'=> 24, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Santa Cruz','provincia_id'=> 24, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Talca','provincia_id'=> 25, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Constitución','provincia_id'=> 25, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Curepto','provincia_id'=> 25, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Empedrado','provincia_id'=> 25, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Maule','provincia_id'=> 25, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Pelarco','provincia_id'=> 25, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Pencahue','provincia_id'=> 25, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Río Claro','provincia_id'=> 25, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Clemente','provincia_id'=> 25, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Rafael','provincia_id'=> 25, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Cauquenes','provincia_id'=> 26, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Chanco','provincia_id'=> 26, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Pelluhue','provincia_id'=> 26, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Curicó','provincia_id'=> 27, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Hualañé','provincia_id'=> 27, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Licantén','provincia_id'=> 27, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Molina','provincia_id'=> 27, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Rauco','provincia_id'=> 27, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Romeral','provincia_id'=> 27, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Sagrada Familia','provincia_id'=> 27, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Teno','provincia_id'=> 27, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Vichuquén','provincia_id'=> 27, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Linares','provincia_id'=> 28, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Colbún','provincia_id'=> 28, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Longaví','provincia_id'=> 28, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Parral','provincia_id'=> 28, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Retiro','provincia_id'=> 28, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Javier','provincia_id'=> 28, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Villa Alegre','provincia_id'=> 28, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Yerbas Buenas','provincia_id'=> 28, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Concepción','provincia_id'=> 29, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Coronel','provincia_id'=> 29, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Chiguayante','provincia_id'=> 29, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Florida','provincia_id'=> 29, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Hualqui','provincia_id'=> 29, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Lota','provincia_id'=> 29, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Penco','provincia_id'=> 29, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Pedro de la Paz','provincia_id'=> 29, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Santa Juana','provincia_id'=> 29, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Talcahuano','provincia_id'=> 29, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Tomé','provincia_id'=> 29, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Hualpén','provincia_id'=> 29, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Lebu','provincia_id'=> 30, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Arauco','provincia_id'=> 30, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Cañete','provincia_id'=> 30, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Contulmo','provincia_id'=> 30, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Curanilahue','provincia_id'=> 30, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Los Álamos','provincia_id'=> 30, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Tirúa','provincia_id'=> 30, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Los Ángeles','provincia_id'=> 31, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Antuco','provincia_id'=> 31, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Cabrero','provincia_id'=> 31, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Laja','provincia_id'=> 31, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Mulchén','provincia_id'=> 31, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Nacimiento','provincia_id'=> 31, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Negrete','provincia_id'=> 31, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Quilaco','provincia_id'=> 31, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Quilleco','provincia_id'=> 31, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Rosendo','provincia_id'=> 31, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Santa Bárbara','provincia_id'=> 31, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Tucapel','provincia_id'=> 31, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Yumbel','provincia_id'=> 31, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Alto Biobío','provincia_id'=> 31, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Chillán','provincia_id'=> 32, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Bulnes','provincia_id'=> 32, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Cobquecura','provincia_id'=> 32, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Coelemu','provincia_id'=> 32, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Coihueco','provincia_id'=> 32, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Chillán Viejo','provincia_id'=> 32, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'El Carmen','provincia_id'=> 32, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Ninhue','provincia_id'=> 32, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Ñiquén','provincia_id'=> 32, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Pemuco','provincia_id'=> 32, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Pinto','provincia_id'=> 32, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Portezuelo','provincia_id'=> 32, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Quillón','provincia_id'=> 32, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Quirihue','provincia_id'=> 32, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Ránquil','provincia_id'=> 32, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Carlos','provincia_id'=> 32, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Fabián','provincia_id'=> 32, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Ignacio','provincia_id'=> 32, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Nicolás','provincia_id'=> 32, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Treguaco','provincia_id'=> 32, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Yungay','provincia_id'=> 32, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Temuco','provincia_id'=> 33, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Carahue','provincia_id'=> 33, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Cunco','provincia_id'=> 33, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Curarrehue','provincia_id'=> 33, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Freire','provincia_id'=> 33, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Galvarino','provincia_id'=> 33, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Gorbea','provincia_id'=> 33, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Lautaro','provincia_id'=> 33, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Loncoche','provincia_id'=> 33, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Melipeuco','provincia_id'=> 33, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Nueva Imperial','provincia_id'=> 33, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Padre las Casas','provincia_id'=> 33, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Perquenco','provincia_id'=> 33, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Pitrufquén','provincia_id'=> 33, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Pucón','provincia_id'=> 33, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Saavedra','provincia_id'=> 33, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Teodoro Schmidt','provincia_id'=> 33, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Toltén','provincia_id'=> 33, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Vilcún','provincia_id'=> 33, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Villarrica','provincia_id'=> 33, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Cholchol','provincia_id'=> 33, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Angol','provincia_id'=> 34, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Collipulli','provincia_id'=> 34, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Curacautín','provincia_id'=> 34, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Ercilla','provincia_id'=> 34, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Lonquimay','provincia_id'=> 34, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Los Sauces','provincia_id'=> 34, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Lumaco','provincia_id'=> 34, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Purén','provincia_id'=> 34, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Renaico','provincia_id'=> 34, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Traiguén','provincia_id'=> 34, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Victoria','provincia_id'=> 34, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Puerto Montt','provincia_id'=> 37, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Calbuco','provincia_id'=> 37, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Cochamó','provincia_id'=> 37, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Fresia','provincia_id'=> 37, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Frutillar','provincia_id'=> 37, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Los Muermos','provincia_id'=> 37, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Llanquihue','provincia_id'=> 37, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Maullín','provincia_id'=> 37, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Puerto Varas','provincia_id'=> 37, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Castro','provincia_id'=> 38, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Ancud','provincia_id'=> 38, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Chonchi','provincia_id'=> 38, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Curaco de Vélez','provincia_id'=> 38, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Dalcahue','provincia_id'=> 38, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Puqueldón','provincia_id'=> 38, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Queilén','provincia_id'=> 38, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Quellón','provincia_id'=> 38, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Quemchi','provincia_id'=> 38, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Quinchao','provincia_id'=> 38, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Osorno','provincia_id'=> 39, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Puerto Octay','provincia_id'=> 39, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Purranque','provincia_id'=> 39, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Puyehue','provincia_id'=> 39, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Río Negro','provincia_id'=> 39, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Juan de la Costa','provincia_id'=> 39, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Pablo','provincia_id'=> 39, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Chaitén','provincia_id'=> 40, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Futaleufú','provincia_id'=> 40, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Hualaihué','provincia_id'=> 40, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Palena','provincia_id'=> 40, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Coyhaique','provincia_id'=> 41, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Lago Verde','provincia_id'=> 41, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Aysén','provincia_id'=> 42, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Cisnes','provincia_id'=> 42, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Guaitecas','provincia_id'=> 42, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Cochrane','provincia_id'=> 43, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'O\'Higgins','provincia_id'=> 43, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Tortel','provincia_id'=> 43, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Chile Chico','provincia_id'=> 44, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Río Ibáñez','provincia_id'=> 44, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Punta Arenas','provincia_id'=> 45, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Laguna Blanca','provincia_id'=> 45, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Río Verde','provincia_id'=> 45, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Gregorio','provincia_id'=> 45, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Cabo de Hornos','provincia_id'=> 46, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Antártica','provincia_id'=> 46, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Porvenir','provincia_id'=> 47, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Primavera','provincia_id'=> 47, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Timaukel','provincia_id'=> 47, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Natales','provincia_id'=> 48, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Torres del Paine','provincia_id'=> 48, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Santiago','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Cerrillos','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Cerro Navia','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Conchalí','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'El Bosque','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Estación Central','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Huechuraba','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Independencia','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'La Cisterna','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'La Florida','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'La Granja','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'La Pintana','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'La Reina','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Las Condes','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Lo Barnechea','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Lo Espejo','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Lo Prado','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Macul','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Maipú','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Ñuñoa','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Pedro Aguirre Cerda','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Peñalolén','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Providencia','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Pudahuel','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Quilicura','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Quinta Normal','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Recoleta','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Renca','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Joaquín','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Miguel','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Ramón','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Vitacura','provincia_id'=> 49, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Puente Alto','provincia_id'=> 50, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Pirque','provincia_id'=> 50, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San José de Maipo','provincia_id'=> 50, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Colina','provincia_id'=> 51, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Lampa','provincia_id'=> 51, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Tiltil','provincia_id'=> 51, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Bernardo','provincia_id'=> 52, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Buin','provincia_id'=> 52, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Calera de Tango','provincia_id'=> 52, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Paine','provincia_id'=> 52, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Melipilla','provincia_id'=> 53, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Alhué','provincia_id'=> 53, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Curacaví','provincia_id'=> 53, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'María Pinto','provincia_id'=> 53, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'San Pedro','provincia_id'=> 53, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Talagante','provincia_id'=> 54, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'El Monte','provincia_id'=> 54, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Isla de Maipo','provincia_id'=> 54, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Padre Hurtado','provincia_id'=> 54, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Peñaflor','provincia_id'=> 54, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Valdivia','provincia_id'=> 35, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Corral','provincia_id'=> 35, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Lanco','provincia_id'=> 35, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Los Lagos','provincia_id'=> 35, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Máfil','provincia_id'=> 35, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Mariquina','provincia_id'=> 35, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Paillaco','provincia_id'=> 35, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Panguipulli','provincia_id'=> 35, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'La Unión','provincia_id'=> 36, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Futrono','provincia_id'=> 36, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Lago Ranco','provincia_id'=> 36, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Río Bueno','provincia_id'=> 36, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Arica','provincia_id'=> 1, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Camarones','provincia_id'=> 1, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'Putre','provincia_id'=> 2, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ],
            [
                'nombre' => 'General Lagos','provincia_id'=> 2, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()
            ]
        ]);
    }
}
