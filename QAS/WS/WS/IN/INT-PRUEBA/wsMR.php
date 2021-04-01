<?php

require_once('../../../lib/nusoap.php'); 

      class ResponseObject {
           public $responseCode = 0;
           public $responseMessage = 'Unknown error!';
           public $stuffArray = NULL;
       }   

       /**
        * @return object
        */ 
       function getStuffs( $user='', $pass='' ) {

           $responseObject = new ResponseObject();

           // check stuffs in a simple way now
           if( !($user == 'someone' and $pass == '1234') ){
               $responseObject->responseCode = 2;
               $responseObject->responseMessage = 'Authentication failed!';
               return $responseObject;
           }

           $responseObject->stuffArray   = array();
           $responseObject->stuffArray[] = array( 'id'=>122, 'name'=>'One stuff');
           $responseObject->stuffArray[] = array( 'id'=>213, 'name'=>'Another stuff');
           $responseObject->stuffArray[] = array( 'id'=>435, 'name'=>'Whatever stuff');
           $responseObject->stuffArray[] = array( 'id'=>65, 'name'=>'Cool Stuff');
           $responseObject->stuffArray[] = array( 'id'=>92, 'name'=>'Wow, what a stuff');          

           $responseObject->responseCode = 1;
           $responseObject->responseMessage = 'Successful!';
           return $responseObject; 
       }

  //     require_once 'nusoap/lib/nusoap.php';
       $server = new soap_server;

       // $myNamespace = $_SERVER['SCRIPT_URI'];
       $myNamespace = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];

       $server->configureWSDL(
           // string $serviceName, name of the service
           'MyStuffService',
           // mixed $namespace optional 'tns' service namespace or false
           // 'urn:' . $myNamespace
           $myNamespace
       );

       // $server->wsdl->schemaTargetNamespace = 'http://soapinterop.org/xsd/';
       $server->wsdl->schemaTargetNamespace = $myNamespace;

       $server->wsdl->addComplexType(
           // name
           'Stuffs',
           // typeClass (complexType|simpleType|attribute)
           'complexType',
           // phpType: currently supported are array and struct (php assoc array)
           'struct',
           // compositor (all|sequence|choice)
           'all',
           // restrictionBase namespace:name (http://schemas.xmlsoap.org/soap/encoding/:Array)
           '',
           // elements = array ( name = array(name=>'',type=>'') )
           array(
               'id' => array(
                   'name' => 'id',
                   'type' => 'xsd:int'
               ),
               'name' => array(
                   'name' => 'name',
                   'type' => 'xsd:string'
               )
           )
       );  

       $server->wsdl->addComplexType(
           // name
           'StuffsArray',
           // typeClass (complexType|simpleType|attribute)
           'complexType',
           // phpType: currently supported are array and struct (php assoc array)
           'array',
           // compositor (all|sequence|choice)
           '',
           // restrictionBase namespace:name (http://schemas.xmlsoap.org/soap/encoding/:Array)
           'SOAP-ENC:Array',
           // elements = array ( name = array(name=>'',type=>'') )
           array(),
           // attrs
           array(
               array(
                   'ref' => 'SOAP-ENC:arrayType',
                   'wsdl:arrayType' => 'tns:Stuffs[]'
               )
           ),
           // arrayType: namespace:name (http://www.w3.org/2001/XMLSchema:string)
           'tns:Stuffs'
       );


       $server->wsdl->addComplexType(
           // name
           'ResponseObject',
           // typeClass (complexType|simpleType|attribute)
           'complexType',
           // phpType: currently supported are array and struct (php assoc array)
           'struct',
           // compositor (all|sequence|choice)
           'all',
           // restrictionBase namespace:name (http://schemas.xmlsoap.org/soap/encoding/:Array)
           '',
           // elements = array ( name = array(name=>'',type=>'') )
           array
           (
               'responseCode' => array(   'type' => 'xsd:int'),
               'responseMessage' => array(   'type' => 'xsd:string'),
               'stuffArray'   => array(   'type' => 'tns:StuffsArray'
                                               // DON'T UNCOMMENT THE FOLLOWING COMMENTED LINES, BECAUSE THIS WAY IT DOESN'T WORK!!! - Left it in the code not to forget it....
                                               // ,
                                               // 'minOccurs' => '0',
                                               // 'maxOccurs' => 'unbounded'
                                               )
           )
       );

       $server->register(
           // string $name the name of the PHP function, class.method or class..method
           'getStuffs',
           // array $in assoc array of input values: key = param name, value = param type
           array(
               'user' => 'xsd:string',
               'pass' => 'xsd:string'
           ),
           // array $out assoc array of output values: key = param name, value = param type
           array(
               'return' => 'tns:ResponseObject'
           ),
           // mixed $namespace the element namespace for the method or false
           // 'urn:' . $myNamespace,
           $myNamespace,
           // mixed $soapaction the soapaction for the method or false
           // 'urn:' . $myNamespace . "#getStuffs",
           $myNamespace . "#getStuffs",
           // mixed $style optional (rpc|document) or false Note: when 'document' is specified, parameter and return wrappers are created for you automatically
           'rpc',
           // mixed $use optional (encoded|literal) or false
           'encoded',
           // string $documentation optional Description to include in WSDL
           'Fetch array of Stuffs ("id", "name").' // documentation
       );

       // $server->wsdl->schemaTargetNamespace = $myNamespace;

       // function def.: nusoap/lib/class.soap_server.php (236)
       $server->service(isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '');

       //   DON'T UNCOMMENT THE FOLLOWING LINES!! - Don't call these headers explicitly,
       //   everything will be handled in function service() appropriately - I know it by experience that it's not a good choice...
       // output:wsdl
       // header('Content-Type: text/xml;charset=utf-8');
       // header('Content-Type: text/xml');
       // echo $server->wsdl->serialize();

       exit(0);

?>