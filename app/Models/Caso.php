<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\AppendEmpresa;
use App\Traits\OnSaveEmpresa;

use PHPExcel;
use PHPExcel_IOFactory;

/**
 * Class Caso
 * @package App\Models
 * @version March 31, 2018, 6:05 pm CLST
 *
 * @property integer empresa_id
 * @property json cliente
 * @property json contraparte
 * @property date fecha_recurso
 * @property date fecha_captacion
 * @property integer captador
 * @property string rol
 * @property string anio_rol
 * @property integer materia_id
 * @property integer estadocaso_id
 * @property integer corte_id
 * @property string tribunal
 * @property integer responsable_proceso
 * @property boolean pyp
 * @property boolean autorizacion_documentos
 */
class Caso extends Model
{
    use SoftDeletes;
    use AppendEmpresa;
    use OnSaveEmpresa;

    public $table = 'casos';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'empresa_id',
        'cliente',
        'contraparte',
        'fecha_recurso',
        'fecha_captacion',
        'captador',
        'rol',
        'anio_rol',
        'materia_id',
        'estadocaso_id',
        'corte_id',
        'tribunal',
        'responsable_proceso',
        'pyp',
        'autorizacion_documentos',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'empresa_id' => 'integer',
        'cliente' => 'object',
        'contraparte' => 'object',
        'fecha_recurso' => 'date',
        'fecha_captacion' => 'date',
        'captador' => 'integer',
        'rol' => 'string',
        'anio_rol' => 'integer',
        'materia_id' => 'integer',
        'estadocaso_id' => 'integer',
        'corte_id' => 'integer',
        'tribunal' => 'string',
        'responsable_proceso' => 'integer',
        'pyp' => 'boolean',
        'autorizacion_documentos' => 'boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        //'cliente' => 'json|required',
        //'contraparte' => 'json|required',
        'fecha_recurso' => 'date|nullable',
        'fecha_captacion' => 'date|required',
        'captador' => 'required',
        'rol' => 'max:50|nullable',
        'anio_rol' =>'integer|nullable',
        'materia_id' => 'required',
        'corte_id' => 'required',
        'tribunal' => 'required|max:30',
        'pyp' => 'boolean',
        'autorizacion_documentos' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function materia()
    {
        return $this->belongsTo(\App\Models\Materia::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function estadoCaso()
    {
        return $this->belongsTo(\App\Models\EstadoCaso::class, 'estadocaso_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function corte()
    {
        return $this->belongsTo(\App\Models\Corte::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function datosCaptador(){

        return $this->hasOne(\App\Models\Empleado::class, 'id', 'captador');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function datosResponsable(){

        return $this->hasOne(\App\Models\Empleado::class, 'id', 'responsable_proceso');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * devuelve la lista de empleados de la empresa en sesion
     */
    public function uploads(){

        return $this->belongsToMany(\App\Models\Upload::class, 'casos_uploads', 'caso_id', 'upload_id');

    }

    public function getNombreCompleto($persona){
        return $persona->nombres . " " . $persona->apellido_paterno . " " . $persona->apellido_materno;
    }

    public function getDireccion($persona){
        return $persona->direccion . ", " . $persona->comuna->nombre . ", " . $persona->provincia->nombre . ", " . $persona->region->nombre;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     **/
    public function observaciones()
    {
        return $this->hasMany(ObservacionCaso::class);
    }

    public static function getCasosPorPeriodo($year, $month){
        $caso = new Caso();

        return $caso->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)->get();
    }

    public static function getCasosEnPreparacion($year = null, $month = null){
        $caso = new Caso();

        if($year !== null){
            $caso = $caso->whereYear('created_at', $year);
        }

        if($month !== null){
            $caso = $caso->whereMonth('created_at', $month);
        }

        $caso = $caso->where('estadocaso_id', 1);

        return $caso->get();

    }

    public function scopeLike($query, $field, $value){
        return $query->where($field, 'LIKE', "%$value%");
    }

    public function getPYP(){
       return $this->pyp == 1 ? 'OK' : 'PENDIENTE';
    }

    public function getAutorizacionDocumentos(){
        return $this->autorizacion_documentos == 1 ? 'OK' : 'PENDIENTE';
    }

    public static function buscar($request){
        $casos = new Caso();

        $array_cliente = [];
        $array_contraparte = [];
        $i = 0;

        if($request->filled('rol')){
            $casos = $casos->where('rol', $request->rol);
        }

        if($request->filled('anio_rol')){
            $casos = $casos->where('anio_rol', $request->anio_rol);
        }

        if($request->filled('captador')){
            $casos = $casos->where('captador', $request->captador);
        }

        if($request->filled('responsable_proceso')){
            $casos = $casos->where('responsable_proceso', $request->responsable_proceso);
        }

        if($request->filled('corte_id')){
            $casos = $casos->where('corte_id', $request->corte_id);
        }

        if($request->filled(['fecha_creacion_desde', 'fecha_creacion_hasta'])){
            $casos = $casos->whereBetween('created_at', [$request->fecha_creacion_desde, $request->fecha_creacion_hasta]);
        }

        if($request->filled(['fecha_recurso_desde', 'fecha_recurso_hasta'])){
            $casos = $casos->whereBetween('fecha_recurso', [$request->fecha_recurso_desde, $request->fecha_recurso_hasta]);
        }

        if($request->filled(['fecha_captacion_desde', 'fecha_captacion_hasta'])){
            $casos = $casos->whereBetween('fecha_captacion', [$request->fecha_captacion_desde, $request->fecha_captacion_hasta]);
        }

        if($request->filled('rut')){
            $array_contraparte[] = ['contraparte->rut', 'like', '%' . $request->rut . '%'];
            $array_cliente[] = ['cliente->rut', 'like', '%' . $request->rut . '%'];
            $i++;
        }

        if($request->filled('nombres')){
            $array_contraparte[] = ['contraparte->nombres', 'like', '%' . $request->nombres . '%'];
            $array_cliente[] = ['cliente->nombres', 'like', '%' . $request->nombres . '%'];
            $i++;
        }

        if($request->filled('apellidopaterno')){
            $array_contraparte[] = ['contraparte->apellidopaterno', 'like', '%' . $request->apellidopaterno . '%'];
            $array_cliente[] = ['cliente->apellidopaterno', 'like', '%' . $request->apellidopaterno . '%'];
            $i++;
        }

        if($request->filled('apellidomaterno')){
            $array_contraparte[] = ['contraparte->apellidomaterno', 'like', '%' . $request->apellidomaterno . '%'];
            $array_cliente[] = ['cliente->apellidomaterno', 'like', '%' . $request->apellidomaterno . '%'];
            $i++;
        }

        if($i > 0){
            $casos->where(function($query)  use ($array_contraparte, $array_cliente){
                $query->where($array_contraparte)->orWhere($array_cliente);
            });
        }

        return $casos;
    }

    public static function exportarExcel($casos){

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'NRO CASO')
            ->setCellValue('B1', 'RUT CLIENTE')
            ->setCellValue('C1', 'NOMBRE CLIENTE')
            ->setCellValue('D1', 'APELLIDO PATERNO CLIENTE')
            ->setCellValue('E1', 'APELLIDO MATERNO CLIENTE')
            ->setCellValue('F1', 'RUT CONTRAPARTE')
            ->setCellValue('G1', 'NOMBRE CONTRAPARTE')
            ->setCellValue('H1', 'APELLIDO PATERNO CONTRAPARTE')
            ->setCellValue('I1', 'APELLIDO MATERNO CONTRAPARTE')
            ->setCellValue('J1', 'FECHA RECURSO')
            ->setCellValue('K1', 'FECHA CAPTACION')
            ->setCellValue('L1', 'CAPTADOR')
            ->setCellValue('M1', 'ROL')
            ->setCellValue('N1', 'MATERIA')
            ->setCellValue('O1', 'ESTADO')
            ->setCellValue('P1', 'CORTE')
            ->setCellValue('Q1', 'TRIBUNAL')
            ->setCellValue('R1', 'RESPONSABLE')
            ->setCellValue('S1', 'AC')
            ->setCellValue('T1', 'AD');;


        $row = 2;
        foreach ($casos as $caso)
        {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $caso->id);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $caso->cliente->rut);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $caso->cliente->nombres);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $caso->cliente->apellido_paterno);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $caso->cliente->apellido_materno);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $caso->contraparte->rut);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $caso->contraparte->nombres);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $caso->contraparte->apellido_paterno);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $caso->contraparte->apellido_materno);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $caso->fecha_recurso->format('d-m-Y'));
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $caso->fecha_captacion->format('d-m-Y'));
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $row, $caso->datosCaptador->nombreCompleto);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $caso->rol . "-" . $caso->anio_rol);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $row, $caso->materia->nombre);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $row, $caso->estadocaso->nombre);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $row, $caso->corte->nombre);
            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $row, $caso->tribunal);
            $objPHPExcel->getActiveSheet()->setCellValue('R' . $row, $caso->datosResponsable->nombreCompleto);
            $objPHPExcel->getActiveSheet()->setCellValue('S' . $row, $caso->getPYP());
            $objPHPExcel->getActiveSheet()->setCellValue('T' . $row, $caso->getAutorizacionDocumentos());

            /*
            $objPHPExcel->getActiveSheet()->setCellValue('U' . $row, $caso->Pav_Ag);
            $objPHPExcel->getActiveSheet()->setCellValue('V' . $row, $caso->Pav_Dp);
            $objPHPExcel->getActiveSheet()->setCellValue('W' . $row, $caso->HNA);
            $objPHPExcel->getActiveSheet()->setCellValue('X' . $row, $caso->BGM);
            $objPHPExcel->getActiveSheet()->setCellValue('Y' . $row, $caso->key_symbols);
            $objPHPExcel->getActiveSheet()->setCellValue('AB' . $row, $caso->EyeC);
            */
            $row++;
        }

        $filename = "Casos_". date("Y-m-d-H-i-s").".xls";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit();
    }


}
