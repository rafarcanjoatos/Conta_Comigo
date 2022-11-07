<!-- require_once Header -->
<?php 
	require_once 'structure_files/header.php';	
?>

	<!-- Container 100% -->
	
	<div class="container">
		<div class="row my-5 my-sm-2">
			<div class="col-md-6">
                <h1 class="my-3">Adiar consulta do paciente</h1>
                <p>Ao adiar uma consulta, o portador irá receber uma mensagem do qual permitirá que ele aceite ou não o adiamento. Tudo de forma digital e prática!</p>
			</div>
		</div>
		<div class="row mb-3 align-items-center">
			<div class="col-md-12 mb-5 py-4">
                <h2 class="mb-4">Escolha uma data e horário</h2>
                <form method="get">
                    <div class="row g-3">

                        <!-- Big Calendar -->
                        <div class="col-md-4 col-sm-12 col-lg-4">
                            <div class="" id="calendario"></div>
                        </div>

                        <!-- Hour Select and Submit-->
                        <div class="col-md-3 col-sm-12 col-lg-4">
                            <div class="form-floating mb-3">
                                <select name="hour_schedule" id="hour_schedule" class="form-select">
                                    <option>14:00</option>
                                    <option>15:00</option>
                                    <option>16:00</option>
                                </select>
                                <label for="hour_schedule" class="form-label">Escolha um Horário</label>                        
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary" value="Remarcar"><i class="far fa-calendar-alt"></i>  Remarcar</button>
                        </div>
                    </div>
                </form>        
			</div>
			
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <a class="btn btn-outline-secondary" href="appointmentschedule.php"><i class="fas fa-angle-left"></i> Cancelar adiamento</a> 
			</div>
        </div>
	</div>

	
	
<!-- require_once Footer -->
<?php 
	require_once 'structure_files/footer.php';	
?>