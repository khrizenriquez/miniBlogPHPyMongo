<?php
abstract class Conectandome
{
	static function conectarme($nombreBd, $nombreColeccion)
	{
		try
		{
			$conectandome = new MongoClient();
			/*$bd = $conectandome->selectDB('$nombreBd');//crea la base de datos de una vez si no existe
			$coleccion = $bd->selectCollection('$nombreColeccion');//se crea la coleccion si no existe*/
			return $conectandome->$nombreBd->$nombreColeccion;//creo una variable y mando a llamar mi variable de conexion y le paso el nombre de la bd y el de la coleccion
		} catch (MongoConnectionException $e)
		{
			die('no se pudo conectar con tu base de datos por algún error externo '.$e->getMessage());
		} catch (MongoException $e)
		{
			die('No se han podido guardar los comentarios '.$e->getMessage());
		}
	}
}
?>