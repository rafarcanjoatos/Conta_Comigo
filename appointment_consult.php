<!-- require_once Header -->
<?php 
    require_once 'structure_files/header.php';
    require_once 'structure_files/connection.php';
	require_once 'php_files/appointments/validate_schedule.php';
?>
	<!-- Search Header -->
	<div class="container">
		<div class="row mt-5 mb-2">
			<div class="col-md-12">
				<h1>Agenda de Consultas</h1>
				<p>Escolha entre filtrar pela Data ou pelo CPF do paciente.</p>
			</div>
		</div>
		<div class="row mb-4">
			<div class="col-md-6">
				<form method="post" autocomplete="off" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="row">
						<label class="col-form-label" for="date_schedule">Escolha o Dia:</label>
					</div>
					<div class="row">
						<div class="col-md-5">
							<input type="text" name="date_schedule" class="form-control" value = "<?php if (($_SERVER["REQUEST_METHOD"] == "POST")&&(!empty($_POST["date_schedule"]))){ echo $_POST['date_schedule'];}?>"  placeholder="DD-MM-AAAA" id="calendario"/>
						</div>
						<div class="col-md-5">
							<button type="submit" name="btn_choosedata" value="Pesquisar" class="btn btn-outline-primary"><i class="fas fa-search"></i> Pesquisar</button>
						</div>
						<div id="campo_date"><?php echo $date_err;?></div> <br />
					</div>
        		</form>
			</div>
			<div class="col-md-6">
				<form method="post" autocomplete="off" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="row">
						<label class="col-form-label" for="cpf">Filtrar por Paciente:</label>
					</div>
					<div class="row">
						<div class="col-md-5">
							<input type="text" name="cpf_schedule" class="form-control" value = "<?php if (($_SERVER["REQUEST_METHOD"] == "POST")&&(!empty($_POST["cpf_schedule"]))){ echo $_POST['cpf_schedule'];}?>" placeholder="000.000.000-00" maxlength="14" id="cpf" onkeyup="validarCpf('cpf', document.getElementById('cpf').value);"/>
						</div>
						<div class="col-md-5">
							<div id="campo_cpf"></div>
						</div>
					</div>
        		</form>
			</div>
		</div>
	</div>
	
	
	<?php	if (($_SERVER["REQUEST_METHOD"] == "POST")&&((!empty($_POST["date_schedule"]))||(!empty($_POST["cpf_schedule"])))){ ?>
    	<!-- Search Results -->
    	<div class="container bg-light rounded border py-3 px-4 mb-5">
    		<div class="row">
    			<div class="col-md-12">
    				<h2>Resultados da Agenda</h2>
    			</div>
    			<span><?php echo $date_err2;?></span>
    			
    		<!-- Start While Show Schedules -->
    		
			<?php
			     if($total_schedule>0){
    		           while($count > 0){ 
    		               $cpf_bd[$count] = acrescentaZero($cpf_bd[$count]);
    		               $cpf_bd[$count] = acrescentaPontuacao($cpf_bd[$count]);
            ?>
    		<div class="row border rounded p-4 bg-white my-3">
    			<div class="col-md-8">
    				<h3>Informações do portador</h3>
    				<ul class="list-group list-group-horizontal-md mb-3">
    					<li class="list-group-item flex-fill">
    						<small class="fw-bold">Nome:</small><br>
    						<span class="text-uppercase"><?php echo $name_holder[$count]; ?></span>
    					</li>
    					<li class="list-group-item flex-fill">
    						<small class="fw-bold">CPF:</small><br>
    						<span class="text-uppercase"><?php echo $cpf_bd[$count]; ?></span>
    					</li>
    					<li class="list-group-item flex-fill">
    						<small class="fw-bold">Telefone:</small><br>
    						<span class="text-uppercase"><?php echo $phone_holder[$count]; ?></span>
    					</li>
    				</ul>
    				<ul class="list-group list-group-horizontal-md">
    					<li class="list-group-item flex-fill">
    						<small class="fw-bold">Hospital:</small><br>
    						<span class="text-uppercase"><?php echo $name_hospital[$count]; ?></span>
    					</li>
    					<li class="list-group-item flex-fill">
    						<small class="fw-bold">Especialidade:</small><br>
    						<span class="text-uppercase"><?php echo $specialty[$count]; ?></span>
    					</li>
    					<li class="list-group-item flex-fill">
    						<small class="fw-bold">Médico:</small><br>
    						<span class="text-uppercase"><?php echo $name_doctor[$count]; ?></span>
    					</li>
    				</ul>
    			</div>
    			<div class="col-md-4">
    				<h3>Data e hora desejada</h3>
    				<?php 
    				    if($is_confirmed[$count]==1){ echo" <div id='btn_$count' class='alert alert-success' role='alert'>" ;}else{}
    				    if($is_confirmed[$count]==2){ echo" <div id='btn_$count' class='alert alert-warning' role='alert'>" ;}else{}
    				    if($is_confirmed[$count]==3){ echo" <div id='btn_$count' class='alert alert-danger' role='alert'>" ;}else{}
                    ?>
                    	<i class="far fa-calendar-alt"></i> <?php echo $date[$count]; ?>
    					<hr>
    					<i class="far fa-clock"></i> <?php echo $start_hour[$count]; ?> horas
    				</div>
    				<form name="form_action" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
        				<div class="btn-group" role="group" aria-label="Basic mixed styles example">
        					<a class="btn btn-outline-success" name="<?php echo $id_appointment[$count]; ?>" id="<?php echo "btn_schedule".$count; ?>" title="<?php echo $count; ?>" onclick="confirmaAgenda(this.name,this.id,this.title)"><i class="fas fa-check"></i> Agendar</a>	
        					<a class="btn btn-outline-warning" name="<?php echo $id_appointment[$count]; ?>" id="<?php echo "btn_porstpone".$count; ?>" title="<?php echo $count; ?>" onclick="adiaAgenda(this.name,this.id,this.title)"><i class="far fa-calendar-alt"></i> Adiar</a>
        					<a class="btn btn-outline-danger" name="<?php echo $id_appointment[$count]; ?>" id="<?php echo "btn_cancel".$count; ?>" title="<?php echo $count; ?>" onclick="cancelaAgenda(this.name,this.id,this.title)"><i class="fas fa-times"></i> Cancelar</a>
        				</div>
    				</form>
    			</div>
    		</div>
            <!-- Close Schedule -->
            <!-- ELSE if not results -->
        	<?php 
        	               $count--;
        	           //Close While
	                   }
	              //Close if Total Schedule
			     } else {  } 
		    //Close IF HAVE POST
            } else { } 
            ?>
        	
        	</div>
		
<script>
	const cpf = document.querySelector("#cpf");
    cpf.addEventListener("keyup", () => {
      let value = cpf.value.replace(/[^0-9]/g, "").replace(/^([\d]{3})([\d]{3})?([\d]{3})?([\d]{2})?/, "$1.$2.$3-$4");
      
      cpf.value = value;
    });
</script>
		
<div class="row">
    <div class="col-12 position-fixed bottom-0 start-0">	
    <!-- require_once Footer -->
    <?php   require_once 'structure_files/footer.php'; ?>
    </div>
</div>

<script>
//Agendar
        function confirmaAgenda(id_appointment,btn_schedule,count){
    		$.ajax({
    			url: 'php_files/appointments/change_schedule.php',
    			type: 'POST',
    			data:{idAppointment:id_appointment},
    			
    			beforeSend: function(){
    				$("#"+btn_schedule).html("Carregando");
    			},                			
    			success: function(data){
    				$("#"+btn_schedule).html("Agendado"); 
    				$("#btn_"+count).css({'background-color':'#d1e7dd'});
    				$("#btn_"+count).css({'border-color':'#badbcc'});
    				$("#btn_"+count).css({'color':'#0f5132'});
    			},
    			error: function(data){
    				$("#"+btn_schedule).html("Erro");
    			},
    		})
        }

//Adiar
        function adiaAgenda(id_appointment,btn_porstpone,count){
     		$.ajax({
        			url: 'php_files/appointments/change_porstpone.php',
        			type: 'POST',
        			data:{idAppointment:id_appointment},
        			
        			beforeSend: function(){
        				$("#"+btn_porstpone).html("Carregando");
        			},                			
        			success: function(data){
        				$("#"+btn_porstpone).html("Adiado");
        				$("#btn_"+count).css({'background-color':'#fff3cd'});
        				$("#btn_"+count).css({'border-color':'#ffecb5'});
        				$("#btn_"+count).css({'color':'#664d03'});
        			},
        			error: function(data){
        				$("#"+btn_porstpone).html("Erro");
        			},
        		})
        }
        
        
//Cancelar
        function cancelaAgenda(id_appointment,btn_cancel,count){
    		$.ajax({
    			url: 'php_files/appointments/change_cancel.php',
    			type: 'POST',
    			data:{idAppointment:id_appointment},
    			
    			beforeSend: function(){
    				$("#"+btn_cancel).html("Carregando");
    			},                			
    			success: function(data){
    				$("#"+btn_cancel).html("Cancelado");
    				$("#btn_"+count).css({'background-color':'#f8d7da'});
    				$("#btn_"+count).css({'border-color':'#f5c2c7'});
    				$("#btn_"+count).css({'color':'#842029'});
    			},
    			error: function(data){
    				$("#"+btn_cancel).html("Erro");
    			},
    		})
        }
</script>