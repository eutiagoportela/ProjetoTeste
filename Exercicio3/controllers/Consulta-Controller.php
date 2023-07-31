<?php


	class ConsultaController 
	{  

			
		// function for reading csv file
		public function index() 
		{

				// including db config file
			include_once './config/db-config.php';
	

			$counter=0;	 

 

				$db =new DBController();

				$conn =$db->connect();

				if($_POST['filtro']<3)
				{
					?><table class="striped" >
						<thead>
							<th>Nº</th>
							<th>Id Organization</th>
							<th>Name</th>
							<th>Website</th>
							<th>Country</th>
							<th>Description</th>
							<th>Founded</th>
							<th>Industry</th>
							<th>Numberofemployees</th>
						</thead>
						
					<?php 
				}
				else
				{?>
				    <table class="striped" >
						<thead>
							<th>Nº</th>
							<th>Industry</th>
							<th>Qtd Organizacoes</th>
							<th>Qtd Employees</th>
						</thead>
					
                <?php }
	
					try 
					{
						    //var_dump($conn);
							if($_POST['filtro']==1)//SELECT * FROM `organizacoes` WHERE Founded<2000 and Numberofemployees<1000 ORDER BY Founded;
							  $sqlFiltro = "SELECT * FROM `organizacoes` WHERE Numberofemployees>5000 ORDER BY Name;";
                            else
						  	if($_POST['filtro']==2)//Organizações fundadas antes dos anos 2000 com menos de 1000 funcionários ordenadas por data de fundação
							  $sqlFiltro = "SELECT * FROM `organizacoes` WHERE Founded<2000 and Numberofemployees<1000 ORDER BY Founded;";
							  else
							    if($_POST['filtro']==3)//Quantidade organizações e funcionários, agrupados por insdustria e pais, e ordenadas por industria.
							     $sqlFiltro = "SELECT Industry,Country,COUNT(*) as QtdOrganizacoes,sum(Numberofemployees) as Qtdemployees FROM `organizacoes` GROUP by Industry,Country ORDER by Industry;";

							$searchResult =  $conn->query($sqlFiltro);	
							$conn -> close();
							//var_dump($searchResult);		
							if ($searchResult !== false && $searchResult->num_rows > 0)
						    {
								while ($organizacao = $searchResult->fetch_assoc())
								{ 
									    //var_dump($organizacao);
										$counter++;	 

										if($_POST['filtro']<3)
										{
											?>           
											        <tr>
														<td> <?php echo $counter; ?> </td>
														<td> <?php echo $organizacao['OrganizationId'] ?> </td>
														<td> <?php echo $organizacao['Name'] ?> </td>
														<td> <?php echo $organizacao['Website'] ?> </td>
														<td> <?php echo $organizacao['Country'] ?> </td>
														<td> <?php echo $organizacao['Description'] ?> </td>
														<td> <?php echo $organizacao['Founded'] ?> </td>
														<td> <?php echo $organizacao['Industry'] ?> </td>
														<td> <?php echo $organizacao['Numberofemployees'] ?> </td>
													</tr>     		

											<?php 
										}
										else
										{?> 
                                                 	<tr>
														<td> <?php echo $counter; ?> </td>
														<td> <?php echo $organizacao['Industry'] ?> </td>
														<td> <?php echo $organizacao['QtdOrganizacoes'] ?> </td>
														<td> <?php echo $organizacao['Qtdemployees'] ?> </td>
													</tr>  
                                        <?php }
								}
								
								?>
								</table>

								<?php
							}
							
                 
						echo '<script>alert("Carregado:'.$counter .' Registros")</script>';
							
							
					}catch (mysqli_sql_exception $exception) {

						$conn -> close();

						echo "exception";
						var_dump($exception);
					}
				
			


	    }	

   }

?>