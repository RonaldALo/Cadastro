	<?php 




 class DatabaseManager extends PDO{

 		public function quickQuery ($query){	
 			// executa a query no banco de dados
			$result = $this->query($query);

			// instancia um array vazio
			$return = [];

			

			while ($line = $result->fetch()) {
				$return[] = $line;
			}

			return $return;
			
 		}

 		public function insert ($query){
          $result = $this->query($query); 

 	    	if($result)
 	    		return true;

 	    	else 
 	    		return false;

 		}


	}

