<!-- require_once Header -->
<?php 
	require_once 'structure_files/header.php';	
?>	
<!-- UPLOAD -> HOME + SCHEDULE + SELECT SPECIALTY + SELECT DOC + SELECT HOUR + LINK + connection + VALIDATE SCHEDULE + INSERT SCHEDULE + VALIDATE CPF(VALIDATION) + FUNC JS -->
<div class="container-fluid	 bg-white">
	<div class="container py-5">
		<div class="row">
			<div class="col-md-12">
				<h1 class="mb-5">Sistema Online Conta Comigo</h1>
			</div>
		</div>
		
		<!-- ROW HOLDER -->
		<div class="row">
		    <!-- Box Consult Holder -->
			<div class="col-lg-3 col-md-3">
				<div class="bg-white border rounded shadow p-4 text-center mb-4 d-grid gap-2">
					<h2><label class="label_1">Verificar Portador</label></h2>
					
					<!-- User Check Icon -->
					<div class="d-md-block d-sm-none d-none m-3">
						<i class="fa fa-user-check fa-3x"></i>
					</div>
					<div class="d-sm-block d-md-none m-3">
						<i class="fa fa-user-check fa-3x"></i>
					</div>
					
					<!-- Button Registers -->
					<a href="holder_consult.php" class="btn btn-primary btn-lg" type="submit">Verificar portador</a>
				</div>
			</div>
		<!-- </div>
		
		 ROW MEDICINE
		<div class="row"> -->
			<!-- Box Schedule -->
			<div class="col-lg-3 col-md-3">
				<div class="bg-white border rounded shadow p-4 text-center mb-4 d-grid gap-2">
					<h2><label class="label_3">Consultas</label></h2>
					
					<!-- Calendar Icon -->
					<div class="d-md-block d-sm-none d-none m-3">
						<i class="far fa-calendar-alt fa-3x"></i>
					</div>
					<div class="d-sm-block d-md-none m-3">
						<i class="far fa-calendar-alt fa-3x"></i>
					</div>
					
					<!-- Button Schedules -->
					<a href="appointment_consult.php" style="text-decoration: none;" type="submit" class="btn btn-primary btn-lg">Ver Agenda</a>
				</div>
			</div>

			<!-- Box Register -->
			<div class="col-lg-3 col-md-3">
				<div class="bg-white border rounded shadow p-4 text-center mb-4 d-grid gap-2">
					<h2><label class="label_1">Nova Consulta</label></h2>
					
					<!-- User Icon -->
					<div class="d-md-block d-sm-none d-none m-3">
						<i class="fas fa-stethoscope fa-3x"></i>
					</div>
					<div class="d-sm-block d-md-none m-3">
						<i class="fas fa-stethoscope fa-3x"></i>
					</div>
					
					<!-- Button Registers -->
					<a href="schedule.php" class="btn btn-primary btn-lg" type="submit">Agendar Consulta</a>
				</div>
			</div>
		</div>
	</div>
	<div><br><br><br></div>
</div>

<div class="row">
    <div class="col-12 position-fixed bottom-0 start-0">	
    <!-- require_once Footer -->
    <?php   require_once 'structure_files/footer.php'; ?>
    </div>
</div>