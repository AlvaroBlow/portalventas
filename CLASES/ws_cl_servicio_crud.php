<?php
include "variables.php";

class CRUD
{
	public $con;
	
	function Conexion( $usuario = '', $pswd = '', $server = '', $bdd = '' ){
		
		try{
			
		$cn =  mysqli_connect("191.232.184.42", "portal_ventas", "Servidores.2015++", "portal_ventas");	
			
			if(!$cn){
				throw new Exception('Error al conectar. ' . $thiscn );
			}else{
				$this->con = $cn;
			}
			
		}catch(Exception $e){

			echo $e->getMessage() , "\n";
			
		}
		
	}
	
	function Insertar( $tblname = '' , $form_data = '' ){
		global $retorno;
		
		$fields = array_keys($form_data);
		
		$sql="INSERT INTO " . $tblname . "(" .implode(',', $fields) . ")  VALUES('" . implode("','", $form_data) . "')";
		
		$cn = $this->con;
		
		try{
			
			$result = mysqli_query($cn, $sql);
			
			if(!$result){
				$retorno = false;
				throw new Exception('Error al Insertar. <br>Insert : ' . $sql . '<br>');
			}else{
				$retorno = true;
			}
			
		}catch(Exception $e){
			echo $e->getMessage() , "\n";
		}
		
		return $result;
		
		
	}
	
	function Update( $tblname = '' , $form_data = '' , $condition = '' ){
		global $retorno;
		
		$sql = "UPDATE " . $tblname . " set " .$form_data . " where " . $condition . "";
		
		$cn = $this->con;
		
		try{
				
			$result = mysqli_query($cn , $sql );
			
			if(!$result){
				$retorno = false;
				throw new Exception('Error al Actualizar registros. <br>Update : ' . $sql . '<br>');
			}else{
				$retorno = true;
			}
			
		}catch(Exception $e){
			echo $e->getMessage() , "\n";
		}
		return $retorno;
	}
	
	function Delete_datos( $tblname = '' , $condition = '' ){
		
		$sql = "delete from " . $tblname . " where " . $condition;
		
		$cn = $this->con;
		
		//echo $sql . "<br>";
		try{
			
			$result = mysqli_query($cn , $sql );
			
			if(!$result){
				throw new Exception('Error al eliminar registros. <br>Delete : ' . $sql . '<br>');
			}
		
		}catch(Exception $e){
			echo $e->getMessage() , "\n";
		}
		
	}
	
	function Select_datos( $tblname = '' , $field_name = '' , $field_id = '' ){
		
		global $row;
		
		$sql = "Select * from ".$tblname." where ".$field_name." = '".$field_id."'";
		
		$cn = $this->con;
		
		try{
			
			$db = mysqli_query($cn, $sql );
			
			if(!$db){
				throw new Exception('Error al seleccionar los datos. ' . $sql . '<br>');
			}else{
				
				$row = mysqli_fetch_object($db);
			}
		
		}catch(Exception $e){
			echo $e->getMessage() , "\n" ;
			$row = null;
		}
		
		return $row;
		
		
	}
	
	
	function Select_datos2($tblname = '' , $condition){
		
		global $row;
		
		$sql = "select * from " . $tblname . " where " . $condition ;
		
		$cn = $this->con;
		
		$row = null;
		
		try{
			
			$db = mysqli_query($cn, $sql);
			
			if(!$db){
				throw new Exception('Error al Seleccionar los Datos. ' . $sql . '<br>');
			}else{
			
				while($v = mysqli_fetch_array($db)){
					
					$row[] = $v;
				
				}

			}
			
			
		}catch(Exception $e){
			echo $e->getMessage() , "\n";
			$row = null;
		}
		
		return $row;
	}
	
	
	function Select_count($tblname = '' , $field_name = '' , $field_id = '' ){
		
		global $row;
		
		$sql = "select count(*) as total from " . $tblname . " where " . $field_name . " = '" . $field_id . "'";
		
		$cn = $this->con;
		
		try{
			
			$db = mysqli_query($cn, $sql);
			
			if(!$db){
				throw new Exception('Error al contar registro. <br> Select Count : ' . $sql . "<br>");
			}else{
				$row = mysqli_fetch_object($db);
			}
			
		}catch(Exception $e){
			echo $e->getMessage() . "\n";
			$row = null;
		}
		
		return $row;
		
	}
	
	function Select_count2($tblname = '' , $condition = ''){
		global $row;
		
		$sql = "select count(*) as total from " . $tblname . " where " . $condition ;
		
		$cn = $this->con;
		
		$row = null;

		try{
			
			$db = mysqli_query($cn, $sql);
			
			if(!$db){
				throw new Exception('Error al contar registro. <br> Select Count : ' . $sql . "<br>");
			}else{
				$row = mysqli_fetch_object($db);
			}
			
		}catch(Exception $e){
			echo $e->getMessage() . "\n";
			$row = null;
		}
		
		return $row;
		
	}
	
	
	function Select_opciones($campos, $tabla, $condicion, $orden){
		
		global $row;
		
		$sql = "select " . $campos . " from " . $tabla . " where " . $condicion . " order by " . $orden;
		
		$cn = $this->con;
		
		try{
			
			$db = mysqli_query($cn,$sql);

			if(!$db){
				throw new Exception('Error en consulta. <br> ' . $sql . '<br>');
			}else{
				
				while($v = mysqli_fetch_array($db)){
					
					$row[] = $v;
				
				}
			}
			
			
		}catch(Exception $e){
			echo $e->getMessage() . "\n";
			$row = null;
		}
		return $row;
	}
		
	function Select_opciones2($campos, $tabla, $orden){
		
		global $row;
		
		$sql = "select " . $campos . " from " . $tabla . " order by " . $orden;
		
		$cn = $this->con;
		
		try{
			
			$db = mysqli_query($cn,$sql);

			if(!$db){
				throw new Exception('Error en consulta. <br> ' . $sql . '<br>');
			}else{
				
				while($v = mysqli_fetch_array($db)){
					
					$row[] = $v;
				
				}
			}
			
			
		}catch(Exception $e){
			echo $e->getMessage() . "\n";
			$row = null;
		}
		return $row;
	}
	
	
	function Select_Max($campo, $tabla){
		
		global $row;
		
		$sql = "select " . $campo . " from " . $tabla;
		
		$cn = $this->con;

		try{
			
			$db = mysqli_query($cn,$sql);

			if(!$db){
				throw new Exception('Error en consulta. <br> ' . $sql . '<br>');
			}else{
				
				while($v = mysqli_fetch_array($db)){
					
					$row[] = $v;
				
				}
			}
			
			
		}catch(Exception $e){
			echo $e->getMessage() . "\n";
			$row = null;
		}
		
		return $row;
		
	}
	
	
	function Cerrar_Conexion(){
		
		$cn = $this->con;
		odbc_close($cn);
		
	}
	
	
}


/*$crud = new CRUD();
$crud->Conexion(UserName,UserPswd,Server,DataBase);
$retorno = $crud->Select_datos('PRODUCCION','uma','00000002110006500003');
*/

//https://www.baulphp.com/insertar-registros-con-funcion-php-ejemplos/
/*
 $campos = array("nombres"=>$_POST['nombres'], "apellidos"=>$_POST['apellidos']);
 $tabla = "tabla_demo";//Tabla en base de datos
 insertar($tabla,$campos);
  while($row = mysqli_fetch_object($resultado))
*/

?>