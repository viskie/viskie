<?
if (strpos($_SERVER["SCRIPT_NAME"],basename(__FILE__)) !== false)
{
	header("location: index.php");
	exit();
}

/*
//function to retrive data from the database
		function getData($query) 
		{
			$query=trim($query); 
			$result = mysql_query($query) or die(mysql_error());
			$resArr = array();
			while($res = mysql_fetch_array($result,MYSQL_ASSOC)) 
			{
				$resArr[] = $res;
			}
			return $resArr;
		}
		
		
//function to retrive 1 row from the database
		function getRow($query) 
		{
			$query=trim($query); 
			$result = mysql_query($query) or die(mysql_error());
			return mysql_fetch_array($result,MYSQL_ASSOC);
		}
		
//function update database
		function updateData($query)
		{	$query=trim($query); 
			$result = mysql_query($query) or die(mysql_error());
			return $result;
		}
		
//Function to Get single value from the database
		function getOne($query)
		{	$query=trim($query); 
			$result = mysql_query($query) or die(mysql_error());
			$res = mysql_fetch_array($result);
			if($res)
				return $res[0];
			else
				return false;
		}
*/	
	class MySql
		{
			public $con;

			//When extending from another model use the base DB
			//If need to connect to another DB initialize class with arguments :)
			public function MySql(){
				$args = func_get_args();
				$num = sizeof($args);
				if($num == 4){
					$this->con =  new mysqli($args[0], $args[1], $args[2], $args[3]);
				} else {
					$this->con =  new mysqli(db_HOST,db_USER,db_PASS,db_DB);
				}
				if ($this->con->connect_errno) {
					printf("Connect failed: %s\n", $this->con->connect_error);
					exit();
				}
			}


			public function getData($query){
				$query=trim($query);
				if(!$result = $this->con->query($query)){
					printf("Error: %s\n", $this->con->error);
				} else {
					$resArr = array();
					while($res = $result->fetch_array(MYSQLI_ASSOC))
					{
						if(is_array($res))
						{
							foreach($res as $key => $value)
							{
								$res[$key] = stripslashes($value);
							}
						}
						$resArr[] = $res;
					}
					$result->close();
					return $resArr;
				}
			}

			//function to retrive 1 row from the database
			public function getRow($query){
				$query=trim($query);
				$pos = strpos($query,'limit');
				if($pos == FALSE){
					$query.=" limit 0,1";
				}
				//log_history('Get Row',$query);
				$result = $this->con->query($query);
				$res = $result->fetch_array(MYSQLI_ASSOC);
				if(is_array($res))
				{
					foreach($res as $key => $value)
					{
						$res[$key] = stripslashes($value);
					}
				}
				$result->close();
				return $res;
			}

		//Function to Get single value from the database
			function getOne($query){
				$query=trim($query);
				$pos = strpos($query,'limit');
				if($pos == FALSE){
					$query.=" limit 0,1";
				}

				$result = $this->con->query($query);
				$res = $result->fetch_array(MYSQLI_ASSOC);
				$retVal = "";
				//echo "Pr: <pre>"; print_r($res); echo "</pre>";
				
				foreach($res as $key => $value)
				{
					$retVal= $value;
				}
				//echo "RV:".$retVal; 
				
				$result->close();
				return $retVal;
			}

			public function updateData($query){
				$query=trim($query);
				//log_history('Update Data',$query);
				if(!$this->con->query($query)){
					printf("Error: %s\n", $this->con->error);
					EXIT;
				}
			}

			public function updateOne($table,$column,$rowId,$rowVal,$value){
				$qry = "update $table set $column = '".$value."' where $rowId = '$rowVal'";
				$this->con->query($qry);
			}

			public function getTables(){
				$qry = "show tables";
				return $this->getData($qry);
			}

			public function emptyTable($tableName){
				$qry = "truncate ".$tableName;
				$this->updateData($qry);
			}

			public function dropTable($tableName){
				$qry = "drop table  ".$tableName;
				$this->updateData($qry);
			}
			
			public function insertId() {
				return $this->con->insertId;
			}

			public function checkTableExists($inpTbl,$db){
				$tables = $this->getTables();
				foreach($tables as $table){
					$tblName = $table['Tables_in_'.$db];
					if($tblName == $inpTbl){
						return true;
					}
				}
				return false;
			}

			public function createTable($tblName, $argArr){
				$qry = "create table ".$tblName." ( ";
				foreach($argArr as $field){
					$qry.=$field[0]." ".$field[1]." ".$field[2].",";
				}
				$qry = rtrim($qry,",");
				$qry.=" )";

				$this->updateData($qry);
			}
	}
	
	//$myCon = new MySQL($host,$user,$pass,$database);

		function getData($query){
			global $myCon;
			return $myCon->getData($query);
		}
	
		function getRow($query) {
			global $myCon;
			return $myCon->getRow($query);
			
		}

		function updateData($query)
		{
			global $myCon;
			$myCon->updateData($query);
		}
		
		function mysql_insert_id() {
			global $myCon;
			return $myCon->con->instertId;
			#return $myCon->insertId();
		}
		
		function getOne($query){
			global $myCon;
			return $myCon->getOne($query);
		}




?>
