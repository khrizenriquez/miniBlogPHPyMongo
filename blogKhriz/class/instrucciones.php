<?php
require_once 'conexionMongo.php';
class instruccionesBD
{
	private $nombreBD;
	private $nombreColeccion;
	private $datos;//si uso esto, debo inicializarla primero

	function __construct()
	{
		$this->nombreBD = 'blogKhriz';//esta es la base de datos
		$this->nombreColeccion = 'articulos';//colecciones son las tablas
	}
	//-----------------metodo para hacer una seleccion de todo lo que esta en la base de datos
	function mostrandoValores()
	{
		$mostrando = Conectandome::conectarme($this->nombreBD, $this->nombreColeccion);

		return $mostrando->find();//con el find obtengo los valores que estan en la base de datos
	}
	//-----------------metodo para hacer una seleccion de todo lo que esta en la base de datos

	//si quisiera devolver unicamente un valor utilizare este metodo, mando 2 parametros, el primero sera la manera que quiero buscar en mi bd, el segundo valor sera el parametro que le enviare para la busqueda
	function mostrandoUnValor($buscarPor, $valorMandado)
	{
		$mostrandoUno = Conectandome::conectarme($this->nombreBD, $this->nombreColeccion);
		//el findOne podria parecerse al select * from where (condicion)
		return $mostrandoUno->findOne(array($buscarPor => new MongoId($valorMandado)));//me devuelve el primer valor encontrado
	}
	//si quisiera devolver unicamente un valor utilizare este metodo

	//-----------------metodo para hacer las inserciones en la base de datos
	function insertandoValores($arregloInsertar)
	{
		$insertando = Conectandome::conectarme($this->nombreBD, $this->nombreColeccion);

		return $insertando->insert($arregloInsertar);
	}
	//-----------------metodo para hacer las inserciones en la base de datos

	//-----------------metodo que se encargara de hacer las actualizaciones
	//le mando 3 parametros, $actualizarPor para indicar por que medio buscare mi valor, peude ser por el id. con valorMandado le indico el valor que le mandare y nuevosValores es un arreglo con los valores a actualizar
	function actualizandoValores($actualizarPor, $valorMandado, $nuevosValores)
	{
		$actualizando = Conectandome::conectarme($this->nombreBD, $this->nombreColeccion);
		
		$actualizando->update(array($actualizarPor => new MongoId($valorMandado)), $nuevosValores);
	}
	//-----------------metodo que se encargara de hacer las actualizaciones
}
?>