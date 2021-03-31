<?php

/**
 * 
 */
class Pedidos_Sap 
{

	private $fecha;
	private $legado;
	private $Interfaz;

	private $tipoDoc;
	private $moneda;
	private $spart;
	private $OrgVenta;

	private $plant;
	private $targetQu;
	private $storeLoc;
	private $itemsArray;

	private $documento;
	private $guid;
	private $docLegado;
	private $distrChan;
	private $purchNoC;

	private $partners;

	/**
	 * Get y Set Header
	 */
	function set_fecha($ax){$this->fecha = $ax;}
	function get_fecha(){return $this->fecha;}
	function set_legado($ax){$this->legado = $ax;}
	function get_legado(){return $this->legado;}
	function set_interfaz($ax){$this->Interfaz = $ax;}
	function get_interfaz(){return $this->Interfaz;}
	/**
	 * Get y Set Documento (item)
	 */
	function set_tipoDoc($ax){$this->tipoDoc = $ax;}
	function get_tipoDoc(){return $this->tipoDoc;}
	function set_moneda($ax){$this->moneda = $ax;}
	function get_moneda(){return $this->moneda;}
	function set_spart($ax){$this->spart = $ax;}
	function get_spart(){return $this->spart;}
	function set_OrgVenta($ax){$this->OrgVenta = $ax;}
	function get_OrgVenta(){return $this->OrgVenta;}
	/**
	 * Get y Set Items
	 */
	function set_plant($ax){$this->plant = $ax;}
	function get_plant(){return $this->plant;}
	function set_targetQu($ax){$this->targetQu = $ax;}
	function get_targetQu(){return $this->targetQu;}
	function set_storeLoc($ax){$this->storeLoc=$ax;}
	function get_storeLoc(){return $this->storeLoc;}
	function set_itemArray($ax){$this->itemsArray[]=$ax;}
	function get_itemArray(){return $this->itemsArray;}
	/**
	 * Get y Set Partners
	 */
	function set_partners($ax){$this->partners[] = $ax;}
	function get_partners(){return $this->partners;}
	/**
	 * Get y Set Documento
	 */
	function set_documento($ax){$this->documento = $ax;}
	function get_documento(){return $this->documento;}
	function set_guid($ax){$this->guid = $ax;}
	function get_guid(){return $this->guid;}
	function set_docLegado($ax){$this->docLegado = $ax;}
	function get_docLegado(){return $this->docLegado;}
	function set_distrChan($ax){$this->distrChan = $ax;}
	function get_distrChan(){return $this->distrChan;}
	function set_purchNoC($ax){$this->purchNoC = $ax;}
	function get_purchNoC(){return $this->purchNoC;}

	function __construct()
	 {
	 	# code...

	 	//Header
	 	$this->set_legado('PORTAL');
	 	$this->set_interfaz('INT-005');
	 	//Documento
	 	$this->set_tipoDoc('ZFMN');
	 	$this->set_moneda('CLP');
	 	$this->set_spart('SC');
	 	$this->set_OrgVenta('DNAC');
	 	$this->set_distrChan('DT');
	 	//Articulos
	 	$this->set_plant('PDBU');
	 	$this->set_targetQu('CJ');
	 	$this->set_storeLoc('BW06');

	 }

	function generaHeader(){
		
		$header = new stdClass();
		$header->Fecha = $this->get_fecha();
		$header->Legado = $this->get_legado();
		$header->Codigointerfaz = $this->get_interfaz();

		return $header;
	}

	function generaItems($arrayItems){

		if (is_array($arrayItems)) {
			# code...
				$total_items = count($arrayItems);

					$itmNumber =  10;
					for ($x=0; $x < $total_items ; $x++) { 

						$items = array('ItmNumber' => $itmNumber,
									   'Material' => $arrayItems[$x]['material'],
									   'Plant' => $this->get_plant(),
									   'StoreLoc' => $this->get_storeLoc(),
									   'TargetQty' => $arrayItems[$x]['cantidad'],
									   'TargetQu' => $this->get_targetQu(),
									   'ItemCateg' => $this->get_tipoDoc());

						$this->set_itemArray($items);
						$itmNumber = $itmNumber + 10;
					}
		}else{
			$this->Mensajes_log('Formato ArrayItems no tiene formato correcto array("material" => "TCOxxxx" , "cantidad" => "xxx");');
			exit('el formato no es correcto.');
		}

	}

	function generaDocumento(){

		$doc = array('item' => array('Guid' => $this->get_guid(),
									 'Doclegado' => $this->get_docLegado(),
									 'Doctype' => $this->get_tipoDoc(),
									 'SalesOrg' => $this->get_OrgVenta(),
									 'DistrChan' => $this->get_distrChan(),
									 'PurchNoC' => $this->get_purchNoC(),
									 'Spart' => $this->get_spart(),
									 'Waerk' => $this->get_moneda(),
									 'ItItems' => $this->get_itemArray(),
									 'ItPartners' => $this->get_partners()));

		return $doc;

	}

	function generaPartners($arrayPartners){

		if (is_array($arrayPartners)) {
			$totalPartners = count($arrayPartners);

				for ($x=0; $x < $totalPartners; $x++){
					$partner= array('PartnRole'   => $arrayPartners[$x]['partnrole'],
					  			    'PartnNumber' => $arrayPartners[$x]['partnnumber']);

					$this->set_partners($partner);			
				}

		}

		
	}


	function preparaEnvio(){


		$opciones = array(
				"exceptions" => true,
				//'features' => SOAP_SINGLE_ELEMENT_ARRAYS + SOAP_USE_XSI_ARRAY_TYPE,
		        'ssl' => array(
		        'verify_peer' => false,
		        'verify_peer_name' => false,
		        'verify_host' => false,
		        'allow_self_signed' => true,
		        'trace' => 1,
		        'soap_version'=>SOAP_1_2,
		        'cache_wsdl'=>WSDL_CACHE_NONE 
		        ),
		        'login' 	 => 'mromero',
		        'password' => 'mromero4'
		    );

		$client = new SoapClient('http://qasaco.aconcaguafoods.cl:8000/sap/bc/srt/wsdl/bndg_EB40934DA08F58F1B54700505601131E/wsdl11/allinone/standard/document?sap-client=500',$opciones);



		$params = (object)array('IsInput' => 
								array('Header' => $this->generaHeader(), 
									   'Documentos' =>$this->generaDocumento(),
							    )
							);

		try {
			

			$client->ZwsSdCreacionPedidosVenta($params);

		} catch (Exception $e) {
			$this->Mensajes_log($e);
		}



	}

	   
	function Mensajes_log($data){
        date_default_timezone_set('Chile/Continental');

		$rutaActual = getcwd();
		$Path = $rutaActual . DIRECTORY_SEPARATOR . 'logs';

        if (!file_exists($Path)) {
        	mkdir($Path,0777,true);
        }


       	$logPath = $Path.DIRECTORY_SEPARATOR.date("Ymd")."_log.txt";
        $mode = (!file_exists($logPath)) ? 'w':'a';
        $logfile = fopen($logPath, $mode);
        fwrite($logfile, "<//===========================================================================//>". PHP_EOL);
        fwrite($logfile, "[".date("d-m-Y H:i:s")."] ". $data . "\n"). PHP_EOL ;
        fwrite($logfile, "<//===========================================================================//>". PHP_EOL);
        fclose($logfile);
    }

}


?>