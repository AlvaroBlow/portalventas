<?php

ini_set("default_socket_timeout", 300);
set_time_limit(300);


$docWSDL = array('IsInput' => '
               <Fecha>2020-12-26</Fecha>
               <Legado>"PORTAL"</Legado>
               <Codigointerfaz>INT-005</Codigointerfaz>
            <Documentos>
               <!--Zero or more repetitions:-->
               <item>
                  <Guid>92EF39427DEA4AC785998DFF0AFA7A3D</Guid>
                  <Doclegado>1</Doclegado>
                  <Doctype>ZFMN</Doctype>
                  <SalesOrg>DNAC</SalesOrg>
                  <DistrChan>DT</DistrChan>
                  <PurchNoC>0809-25029777</PurchNoC>
                  <Spart>SC</Spart>
                  <Waerk>CLP</Waerk>
                  <ItItems>
                     <!--Zero or more repetitions:-->
                     <item>
                        <ItmNumber>10</ItmNumber>
                        <Material>TCO10187</Material>
                        <Plant>PDBU</Plant>
                        <StoreLoc>BW06</StoreLoc>
                        <TargetQty>10</TargetQty>
                        <TargetQu>CJ</TargetQu>
                        <ItemCateg>ZFMN</ItemCateg>
                     </item>
                  </ItItems>
                  <ItPartners>
                     <!--Zero or more repetitions:-->
                     <item>
                        <PartnRole>AG</PartnRole>
                        <PartnNumber>0000010967</PartnNumber>
                     </item>
                     <item>
                        <PartnRole>WE</PartnRole>
                        <PartnNumber>0000101521</PartnNumber>
                     </item>
                  </ItPartners>
               </item>');

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


$header = array('IsInput' => array('Header' => array('Fecha'=> '2020-12-26','Portal' => 'PORTAL', 'Codigointerfaz' => 'INT-005' ),
				'Documentos' => array('Guid' =>'92EF39427DEA4AC785998DFF0AFA7A3D',
									  'Doclegado' => '1',
									  'Doctype' =>'ZFMN',
									  'SalesOrg' => 'DNAC',
									  'DistrChan' => 'DT',
									  'PurchNoC' => '0809-25029777',
									  'Spart' => 'SC',
									  'Waerk' => 'CLP',
									  array('It_Items' => array('ItmNumber' => '10',
									  							'Material' => 'TCO10187',
									  							'Plant' => 'PDBU',
									  							'StoreLoc' => 'BW06',
									  							'TargetQty' => '10',
									  							'TargetQu' => 'CJ',
									  							'ItemCateg' => 'ZFMN' ),
									  array('It_Partners' => array('PartnRole' => 'AG',
																   'PartnNumber' => '0000010967'),
									  						array('PartnRole' => 'WE',
																   'PartnNumber' => '0000101521')
											)
									)
			)
		)
);



/*
                     <item>
                        <PartnRole>AG</PartnRole>
                        <PartnNumber>0000010967</PartnNumber>
                     </item>
                     <item>
                        <PartnRole>WE</PartnRole>
                        <PartnNumber>0000101521</PartnNumber>
                     </item>
*/



	$header2 = array('IsInput' => array('Header' => array('Fecha' => '2020-12-28',
														   'Legado' => 'PORTAL',
													       'Codigointerfaz' => 'INT-005'),
										'Documentos' => array('item' => array('Guid' => '61EF39427DEA4AC785998DFF0AFA7A3D',
																			   'Doclegado' => '1',
																			   'Doctype' => 'ZFMN',
																			   'SalesOrg' => 'DNAC',
																			   'DistrChan' => 'DT',
																			   'PurchNoC' => '0809-25029773',
																			   'Spart' => 'SC',
																			   'Waerk' => 'CLP'),
																			'ItItems' => array('Item' => array(array('ItmNumber' => '10',
																													 'Material' => 'TCO10187',
																													 'Plant' => 'PDBU',
																													 'StoreLoc' => 'BW06',
																													 'TargetQty' => '10',
																													 'TargetQu' => 'CJ',
																													 'ItemCateg' => 'ZFMN')
																												)
																									),
																				
																	'ItPartners' => array('item' => array(array('PartnRole' => 'AG',
																												'PartnNumber' => '0000010967')
																											)
																						)
																)
									)
				);
		//	array('DOCUMENTOS'));
echo "<pre>";
	print_r($header2);
echo "</pre>";

$rest = $client->__call('ZwsSdCreacionPedidosVenta',array('IsInput' => $header2));

?>