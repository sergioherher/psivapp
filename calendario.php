<?php include_once 'includes/templates/header.php'; ?>

	<div class="container clearfix">
		<div class="row">
			<div class="col s12">
				<h2>Calendario de Eventos</h2>
			</div>
			<?php
				try{
					require_once ('includes/funciones/bd_conexion.php');
					$sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
					$sql .= " FROM eventos ";
					$sql .= " INNER JOIN categoria_evento ";
					$sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
					$sql .= " INNER JOIN invitados ";
					$sql .= " ON eventos.id_inv = invitados.invitado_id ";
					$sql .= " ORDER BY fecha_evento, hora_evento";
					$resultado = $conn->query($sql);
				}
				catch(Exeption $e){
					$error = $e->getMessage();
				}
			?>
			<?php
					$calendario = array();

					while($eventos = $resultado->fetch_assoc()){
						// Obtener la fecha del evento
						$fecha = $eventos['fecha_evento'];

						$evento = array(
							'titulo' => $eventos['nombre_evento'],
							'fecha' => $eventos['fecha_evento'],
							'hora' => $eventos['hora_evento'],
							'categoria' => $eventos['cat_evento'],
							'icono' => $eventos['icono'],
							'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado']
						);

						$calendario[$fecha][] = $evento; ?>
			<?php	} //while fetch_assoc() ?>
				<?php
				//Imprimir todos los eventos
				foreach ($calendario as $dia => $lista_eventos) { ?>
				<div class="row">
					<div class="col s12 calendario">
						<div class="card">
							<h3>
								<i class="fa fa-calendar" aria-hidden="true"></i>
								<?php
									//Unix
									setlocale(LC_TIME, 'es_ES.utf-8');
									//Windows
									setlocale(LC_TIME, 'spanish');

									echo strftime("%A, %d de %B del %Y", strtotime($dia));
								?>
							</h3>
						</div>
					</div>
				</div>
				<?php
				$i=1;
				foreach ($lista_eventos as $evento) { ?>
					<?php if($i == 1 || $i==4 || $i==7) { ?>
					<div class="row">
					<?php } ?>
						<div class="col s4">
							<div class="card white dia">
						        <div class="card-content" style="height: 100px">
							        <span class="card-title"><?php echo $evento['titulo']; ?></span>
							        
						        </div>

						        <div class="card-action">
						          	<p>
										<i class="fa fa-clock-o" aria-hidden="true"></i>
										<?php echo $evento['fecha'] . "<br> " . $evento['hora']; ?>
									</p>
									<p>
										<i class="fa <?php echo $evento['icono']; ?>" aria-hidden="true"></i>
										<?php echo $evento['categoria']; ?>
									</p>
						        </div>
						        <div class="card-action card-invitado">
						          	<a href="invitado.php"><i class="fa fa-user" aria-hidden="true"></i>
										<?php echo $evento['invitado']; ?></a>
						        </div>
						    </div>
						</div>
					<?php if($i == 3 || $i==6 || $i==9) { ?>
					</div>
					<?php } ?>
				<?php $i++; } //Fin de eventos ?>	
			<?php } //Fin forech de dias ?>
			</div>
		</div><!-- .calendario -->
	</div>

	<?php
		$conn->close();
	?>

<?php include_once 'includes/templates/footer.php'; ?>
