<!DOCTYPE html>
<html lang='es-mx'>
	<head>
		<!--[if lte IE 7]><script src="js/elusive/lte-ie7.js"></script><![endif]--> 
		<meta http-equiv='Content-type' content="text/html; charset='UTF-8'" />
		<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />
		<link rel="stylesheet" href="css/propios/estiloBlogCreados.css" />
		<title>Blog khriz, tus posts</title>
	</head>
	<body>

		<section id='sectionContenedora'>

			<div id='divContenedorPost'>
				<form action="class/actualizandoDatos.php" method='POST'>
					<?php
					require_once 'class/instrucciones.php';
					$instrucciones = new instruccionesBD();

					$unDato = $instrucciones->mostrandoUnValor('_id', $_GET['id']);//instancio para mostrar un unico valor
					?>
					<div id='divTituloPosts'>
						<figure>
							<img src="img/iconos/people-icon.png">
						</figure>
						<h2>Tus posts:</h2>
					</div>

					<label id='lblTituloPost' name='lblTituloPost' class='input-block-level'>Título post:</label>
					<input required placeholder='Título del post' type='text' class='input-block-level' id='txtTituloPost' name='txtTituloPost' value="<?php print $unDato['titulo']; ?>" />

					<label id='lblContenidoPost' name='lblContenidoPost' class='input-block-level'>Contenido:</label>
					<textarea rows='5' required placeholder='Contenido' class='input-block-level' title='' id='txtAreaContenidoPost' name='txtAreaContenidoPost'><?php print $unDato['contenido']; ?></textarea>

					<button href='' name='btnActualizarPost' id='btnActualizarPost' class='btn btn-inverse input-block-level'><i class='icon-file-edit-alt'></i> Actualizar</button>
					<a href="class/eliminarDatos.php?idEliminar=<?php print $_GET['id']; ?>" name='btnEliminarPost' id='btnEliminarPost' class='btn btn-danger input-block-level'><i class='icon-trash-alt'></i> Eliminar</a>
					<input type='hidden' name='txtCorrelativo' value="<?php print $_GET['id']; ?>" />
				</form>
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