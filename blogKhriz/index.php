<?php
if(isset($_POST['btnGuardar']) && (isset($_POST['txtAreaContenidoPost'])))
{
	$accion = 'guardarArticulo';
}else
{
	$accion = 'mostarArticulo';
}
require_once 'class/instrucciones.php';
$instrucciones = new instruccionesBD();
switch ($accion)
{
	case 'guardarArticulo':
		$articuloInsertado = array();
		$articuloInsertado['titulo'] = strip_tags($_POST['txtTituloPost']);
		$articuloInsertado['contenido'] = strip_tags($_POST['txtAreaContenidoPost']);
		$articuloInsertado['fechaGuardado'] = new MongoDate();
		$articuloInsertado['estado'] = "activo";
		$insertando = $instrucciones->insertandoValores($articuloInsertado);
		break;
	case 'mostarArticulo':
		break;
	default:
		break;
}

?>
<!DOCTYPE html>
<html lang='es-mx'>
	<head>
		<!--[if lte IE 7]><script src="js/elusive/lte-ie7.js"></script><![endif]--> 
		<meta http-equiv='Content-type' content="text/html; charset='UTF-8'" />
		<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />
		<link rel="stylesheet" href="css/propios/estiloIndex.css">
		<title>Blog khriz, usando MongoDB y PHP</title>
	</head>
	<body>

		<section id='sectionContenedora'>

			<div id='divPublicarBlogDerecha'>
				<form action="index.php" method='POST'>

					<div id='divTituloComentarios'>
						<figure>
							<img src="img/iconos/Marker-icon.png">
						</figure>
						<h2>Comenta:</h2>
					</div>

					<label id='lblTituloPost' name='lblTituloPost' class='input-block-level'>Título post:</label>
					<input required placeholder='Título del post' type='text' class='input-block-level' id='txtTituloPost' name='txtTituloPost' />

					<label id='lblContenidoPost' name='lblContenidoPost' class='input-block-level'>Contenido:</label>
					<textarea rows='5' required placeholder='Contenido' class='input-block-level' title='' id='txtAreaContenidoPost' name='txtAreaContenidoPost'></textarea>

					<button name='btnGuardar' id='btnGuardar' class='btn btn-info input-block-level'><i class='icon-pencil-alt'></i> Guardar</button>
				</form>
			</div>
			<div id='divContenedorBlogsHechos'>
				<div id='divTituloPosts'>
					<figure>
						<img src="img/iconos/notepad-icon.png">
					</figure>
					<h2>Tus blogs:</h2>
				</div>

				<?php
				require_once 'class/instrucciones.php';
				$instrucciones = new instruccionesBD();

				$mostrando = $instrucciones->mostrandoValores();
				while ($mostrando->hasNext())
                {
                	$articulo = $mostrando->getNext();
                	if(@$articulo['estado'] == 'activo')//si esta activo no lo han borrado "aparentemente"
                	{
				?>
				<h3><?php print $articulo['titulo']; ?></h3>
				<p>
					<?php print substr($articulo['contenido'], 0, 200).'...'; ?>
					<a href="comentarioIndividual.php?id=<?php print $articulo['_id']; ?>">seguir leyendo.</a>
				</p>
				<hr />
				<?php
					}
				}
				?>

			</div>
		</section>

		<footer>
			<label id='lblPieDesarrollador'>Desarrollador por <a href="https:www.twitter.com/khrizenriquez">@khrizenriquez</a> </label>
		</footer>

		<!--area de scripts -->
		<script src='js/prefixfree.js'></script>
		<script src='js/jQuery/jquery.min.js'></script>
		<script src='js/bootstrap/bootstrap.min.js'></script>
		<!--area de scripts -->
	</body>
</html>