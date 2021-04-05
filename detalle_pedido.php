<?php

require_once('clases/ws_cl_servicio_crud.php');


class detalle_pedido{

	private $pedido_local;
	private $conn;
	private $crud;
	private $detalle;
	private $total;

	function set_total($ax){$this->total += $ax;}
	function get_total(){return $this->total;}
	function set_detalle($ax){$this->detalle[]=$ax;}
	function get_detalle(){return $this->detalle;}
	function set_pedidoLocal($ax){$this->pedido_local=$ax;}
	function get_pedidoLocal(){return $this->pedido_local;}
	function set_con($ax){$this->conn=$ax;}
	function get_con(){return $this->conn;}


	function __construct(){
		//===============Conexión PORTAL-VENTAS=============================//
		$this->crud = new CRUD();
		$this->crud->Conexion(UNP,UPP,S,DB);
		//================================================================/
	}


	function detallePedido(){


		$con 	= $this->get_con();
		$pedido = $this->get_pedidoLocal();


		$tbl 			= "PEDIDOS";
		$campo 			= " ID_INTERNO ";
		$campoConsultar = $this->get_pedidoLocal();
		$rows 			= $this->crud->Select_datos($tbl,$campo,$campoConsultar);

		$str 	= get_object_vars($rows);
		$pedido = json_encode($str['PEDIDO']);

		$data 	= explode("s:8:", $pedido);

		$data 	= str_replace('\\', "", $data);
		$key 	= array('i','s',';','"');

		for ($i=1; $i < count($data); $i++) {

				$data2 	  = explode(":", str_replace($key, '', $data[$i]));
				$descrip  = $this->descripcion_material($data2[0]);

				$material = array('MATERIAL'	=> $data2[0],
								  'CANTIDAD' 	=> $data2[1],
								  'DESCRIPCION' => $descrip);

			$this->set_total($data2[1]);
			$this->set_detalle($material);
		}

	}


	function descripcion_material($material = ''){

		if (!isset($material)) {
			return 'Sin descripción';
		}


		$tbl = "MATERIALES";
		$campo = "MATNR";
		$campoConsultar = $material;

		$rows = $this->crud->Select_datos($tbl,$campo,$campoConsultar);
		$str = get_object_vars($rows);

		return $str['VTEXT_2'];

	}



}


$clp = new detalle_pedido();
$clp->set_pedidoLocal(9);		//Número de Pedido
$clp->detallePedido();			//Genera detalle Pedido
$dat = $clp->get_detalle();		//Rescata el detalle de cada material y retorna array con el detalle (materia-cantidad-descripcion)
$total = $clp->get_total();		//Cantidad Total de cajas

echo "Total : " . $total . "<br>";
echo "<pre>";
	print_r($dat);
echo "</pre>";


?>