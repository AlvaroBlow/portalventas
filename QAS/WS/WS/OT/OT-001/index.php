 <?php  

//require_once("ws_cl_servicio_crud.php");
//error_reporting(E_ALL ^ E_NOTICE);

/**
 * 
 */
class PedVentas{
	
	private $data;
	private $soap_ET;
	private $datos_Array;

	function set_datosArray($ax){
		$this->datos_Array = $ax;
	}
	function get_datosArray(){
		return $this->datos_Array;
	}
	function set_soap($ax){
		$this->soap_ET = $ax;
	}
	function get_soap(){
		return $this->soap_ET;
	}
	function set_data($ax){
		$this->data = $ax;
	}
	function get_data(){
		return $this->data;
	}

	
	function __construct(){
		$this->set_soap("http://devaco.aconcaguafoods.cl:8000/sap/bc/srt/wsdl/bndg_EB2F24AF7925E8F199FC005056AE47DB/wsdl11/allinone/standard/document?sap-client=230");
	}


	function ws_datos_soap(){
	$SOAP_AUTH = array( 'login'    => 'mromero',
						'password' => 'mromero');								
				//Revisar Servicio Web Etiquetado0005
			$WSDL = $this->get_soap();
			
			$client = new SoapClient($WSDL,$SOAP_AUTH);			
			try{
					
					$params =  array( 'WPlnum' 			=>$this->get_ordenPrevPrd(), 
									  'WMatnr' 			=>$this->get_materialPrd());
					
					$retorno = $client->ZwsSdCreacionPedidosVenta($cabecera,$params);

						//Cabecera_Fecha_Hora
						$cabecera = array('WTipo' => 'AN',
								 			 'WExidv' => $uma,
								 			 'WFechaSemi' => $this->formatoFechaSAP($this->get_FechaCod()
								 		));
						//Parametros a Enviar
						$params =  array('WTipo' => 'N',
											 'WCantidad'  =>$this->,
											 'WEnvase' 	  =>$this->,
											 'WFechaSemi' =>$this->,
											 'WFecha_1'   =>$this->,
											 'WHora' 	  =>$this->,
											 'WLinea' 	  =>$this->,
											 'WLote' 	  =>$this->,
											 'WMaterial'  =>$this->,
											 'WPlnum' 	  =>$this->,
											 'WVerid'     =>$this->
										);

/*						$parameter = array('ETColumnDescription' => null,
				                             'ETGridData' => null,
				                             'ETMessageLog' => null,
				                             'ETRowDescription' => null,
                                             'ISVar_01xwerbet' => array('Sign' => 'I',
					                                                    'Option' => 'LE',
					                                                    'Low' => '3',
					                                                    'High' => null));	*/

						$this->set_datosArray($datosArray);

						//var_dump($datosArray);

					//$this->EnviaJson($datosArray);
/*					echo "<pre>";
					print_r($retorno);
					echo "</pre>";*/
			}catch(SoapFault $exception){
				
				echo "<pre>";
					print_r($exception);
				echo "</pre>";
				
			}

		}//FIN funcion ws_datos_soap

	
	}//fin clase PedVentas


?>	