<?php


	class ImportController {

			
		// function for reading csv file
		public function index() 
		{

				// including db config file
			include_once './config/db-config.php';
	
        	$fileName="";

        	// if there is any file
	        if(isset($_FILES['file'])){

				var_dump($_FILES['file']);
	        	// reading tmp_file name
				if (isset($_POST['importar']))
				{
	    	      $fileName=$_FILES["file"]["tmp_name"];
				  $file=fopen($fileName, "r");	
				}
				else
				 if(isset($_POST['importarMaior']))
				  $file=fopen("Arquivo/organizations-100000.csv", "r");
	        }

			$counter=0;	 

				$db =new DBController();

				$conn =$db->connect();


			    fgetcsv($file);  

					$conn->begin_transaction();

					try 
					{
								$conn->query("DELETE FROM organizacoes");			
								while (($linha = fgetcsv($file, 0, ",")) !== FALSE) 
								{ 
									
										$counter++;	 



										if(count($linha)==1)//corigindo campo que tem separacao por aspas e virgula
										{
											$aux = explode(',', $linha[0]);
											$linha = array($aux[0] ,$aux[1],str_replace('"', '', $aux[2] . $aux[3]),$aux[4],$aux[5],$aux[6],$aux[7],$aux[8],$aux[9]);
										}
										
										$OrganizationId    =   $linha[1];
										$Name         	   =   $linha[2];	        	 		
										$Website           =   $linha[3];	        	 		
										$Country		   =   str_replace("'","\'",$linha[4]);
										$Description       =   $linha[5];
										$Founded           =   $linha[6];	        	 		
										$Industry		   =   $linha[7];
										$Numberofemployees =   $linha[8];

										echo "Registro: ".$counter ."- Nome: " .$Name ."</br></br>";

										$sql 				=		"INSERT INTO organizacoes (OrganizationId, Name, Website, Country, Description, Founded, Industry, Numberofemployees) 
										VALUES ('$OrganizationId', '$Name', '$Website', '$Country', '$Description', $Founded, '$Industry', $Numberofemployees) ";

										$result 			=		$conn->query($sql);

										if($result==0)
										var_dump($conn -> error);

								}
								
								?>
								</table>

								<?php

                        echo "Concluido: ".$counter." Registros";
						fclose($file);		
						$conn->commit();
						$conn -> close();
					} catch (mysqli_sql_exception $exception) {
						$conn->rollback();
						$conn -> close();
						fclose($file);	
						echo "exception";
						var_dump($exception);
					}
			
					echo '<script>alert("Carregado:'.$counter .' Registros")</script>';


	
	}	

}

?>