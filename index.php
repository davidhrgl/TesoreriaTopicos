<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Control de Tesoreria</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/css/alertify.min.css">
<link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title sticky-top">
                <div class="row">
                    <div class="col-md-6">
						<h2><b>Tesoreria</b></h2>
					</div>
                </div>
            </div>
			<div class='clearfix'></div>
			<hr>
			<div class="table-responsive col-md-6"> <!-- Carga de datos ajax de Saldos aqui-->
				<table id="datatable-saldos" class="table">
					<thead>
						<div class="table-success"><div><div>
						<h2><b>Saldos</b></h2>
						</div></div></div>
						<tr>
							<th>Disponible</th>
							<th>Fecha</th>
						</tr>
					</thead>
					<tbody id="tbody_saldos"></tbody>
				</table>
			</div>

			<div class="table-responsive col-md-12"> <!-- Carga de datos ajax de TipoCambio aqui-->
				<table id="datatable-cambios" class="table">
						<thead>
						<div class="table-danger "><div><div>
						<h2><b>Cambios</b></h2>
						</div></div></div>
						<tr class="col-md-12">
							<th>Dolar</th>
							<th></th>
							<th>Euro</th>
							<th></th>
							<th>Centenario</th>
							<th></th>
							<th>Onza Libertad Oro</th>
							<th></th>
							<th>Onza Libertad Plata</th>
							<th></th>
						</tr>
						<tr>
							<th>Compra</th>
							<th>Venta</th>
							<th>Compra</th>
							<th>Venta</th>
							<th>Compra</th>
							<th>Venta</th>
							<th>Compra</th>
							<th>Venta</th>
							<th>Compra</th>
							<th>Venta</th>
						</tr>
						</thead>
					<tbody id="tbody_cambios"></tbody>
				</table>
			</div>

			<div class="table-responsive"> <!-- Carga de datos ajax de Empleados-->
				<table id="datatable-empleados" class="table">
					<thead>
					<div class="table-info "><div><div>
						<h2><b>Empleados</b></h2>
						</div></div></div>
						<tr>
							<th>Id</th>
							<th>Tipo</th>
							<th>Nombre</th>
							<th>Direccion</th>
							<th>Telefono</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody id="tbody_empleados"></tbody>
				</table>
			</div>

			<div class="table-responsive"> <!-- Carga de datos ajax de Clientes-->
				<table id="datatable-clientes" class="table">
					<thead>
					<div class="table-warning"><div><div>
						<h2><b>Clientes</b></h2>
						</div></div></div>
						<tr>
							<th>Id</th>
							<th>Nombre</th>
							<th>Direccion</th>
							<th>Telefono</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody id="tbody_clientes"></tbody>
				</table>
			</div>

			<div class="table-responsive"> <!-- Carga de datos ajax de Proveedores-->
				<table id="datatable-proveedores" class="table">
					<thead>
					<div class="table-active"><div><div>
						<h2><b>Proveedores</b></h2>
						</div></div></div>
						<tr>
							<th>Id</th>
							<th>Nombre</th>
							<th>Direccion</th>
							<th>Telefono</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody id="tbody_proveedores"></tbody>
				</table>
			</div>

        </div>
	</div>

	<!--Ventana Modal, Agregar Camion-->
	<!-- Large modal -->
	<!-- Modal -->
	<div id="addCamionModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addCamionModal" aria-hidden="true">
		<div class="modal-lg modal-dialog">
			<div class="modal-content">
				<form name="add_camion" id="add_camion">
					<div class="modal-header">
						<h4 class="modal-title">Registrar Movimiento</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Tipo de Vehículo</label>
							<input type="text" name="Tipo" id="tipo" class="form-control" required>
	
						</div>
						<div class="form-group">
							<label>Marca</label>
							<input type="text" name="Marca" id="marca" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Submarca</label>
							<input type="text" name="Submarca" id="submarca" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Modelo</label>
							<input type="text" name="Modelo" id="modelo" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Kilometraje</label>
							<input type="number" name="Kilometraje" id="kilome" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Placa</label>
							<input type="text" name="Placa" id="placa" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Número Económico</label>
							<input type="number" name="Número Económico" id="num_econom" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Número de Póliza</label>
							<input type="text" name="Número de Póliza" id="num_poli" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Número de Contenedores</label>
							<input type="number" name="Número de Contenedores" id="num_cont" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Tipo de Contenedores</label><br>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="contenedor" id="contenedor1" value="Desechos Organicos" checked>
								<label class="form-check-label" for="contenedor1">
									Desechos Orgánicos
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="contenedor" id="contenedor2" value="Desechos Inorganicos">
								<label class="form-check-label" for="contenedor2">
									Desechos Inorgánicos
								</label>
							</div>
							<div class="form-check ">
								<input class="form-check-input" type="radio" name="contenedor" id="contenedor3" value="Valorizables y Reutizables">
								<label class="form-check-label" for="contenedor3">
									Desechos Valorizables y Reutilizables
								</label>
							</div>
						</div>
						<div class="form-group">
							<label>Capacidad en Toneladas (c/u)</label>
							<input type="text" name="Capacidad" id="capacidad" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Descripción</label>
							<textarea name="Descripción" id="descripcion" cols="70" rows="9" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Status</label><br>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="status_vehicle" id="status_vehicle1" value="Disponible" checked>
								<label class="form-check-label" for="status_vehicle1">
									Disponible
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="status_vehicle" id="status_vehicle2" value="En Reparacion">
								<label class="form-check-label" for="status_vehicle2">
									En Reparación
								</label>
							</div>
							<div class="form-check ">
								<input class="form-check-input" type="radio" name="status_vehicle" id="status_vehicle3" value="Fuera de Servicio">
								<label class="form-check-label" for="status_vehicle3">
									Fuera de Servicio
								</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar" id="close_modal">
						<input type="button" class="btn btn-success" value="Guardar datos" id = "btnaddCamion">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="assets/js/jquery-3.3.1.js"></script>
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap4.min.js"></script>
	<script src="assets/js/alertify.min.js"></script>
	<script src="assets/js/api.js"></script>
	<script src="assets/js/modal.js"></script>
	<script src="assets/js/util.js"></script>
	<script>
	$(document).ready(function () {
		getEmpleados();
		getSalds();
		getCamb();
		getClientes();
		getProveedors();
	});
	</script>
</body>
</html>                                		                            
