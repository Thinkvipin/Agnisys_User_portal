<?php 

$company_name = 'test';
$customer_name = 'test';
$nodelock = 'yes';

try {

    if( !empty($company_name) ) {
        //Initialise the cURL var
        $ch = curl_init();

        if ($ch === false) {
            throw new Exception('failed to initialize');
        }

        //Get the response from cURL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //Set the Url
        curl_setopt($ch, CURLOPT_URL, 'https://ids.agnisys.com/licserver/getData');

        $curlFile = curl_file_create(getcwd() . '/public/Sample.txt');

        //Create a POST array with the file in it
        $postData = array(
            'customer_name' => $company_name,
            'company_name' => $company_name,
            'nodelock'  => 'yes',
            'file' => $curlFile,
        );

        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        // Execute the request
        $response = curl_exec($ch);

        if ($response === false) {
            throw new Exception(curl_error($ch), curl_errno($ch));
        }

        echo json_encode(array('status' => true, 'data' => $response));
    } else {
        echo json_encode(array('status' => false));
    }

} catch(Exception $e) {

    trigger_error(sprintf(
        'Curl failed with error #%d: %s',
        $e->getCode(), $e->getMessage()),
        E_USER_ERROR);

}


// $file = getcwd() . '/' . uniqid() . '.txt';

// $licFileData = array(
//     'commnets' => '############# AGNISYS LICENSE FILE #############',
//     'server_id' => 'SERVER_UUID  REVTS1RPUFZEU01GTDFBNDRDQzgzOEMzMzQ=',
//     'port'      => 'PORT       2464',
// );

// $productData = array(

//     'product' => 'PRODUCT    IDSBatch    1   25-08-2019    WAN',
//     'feature' => 'FEATURE    CHECK IDS_TEMPLATES AMBA AMBA_APB AMBA_AXI AMBA3AHBLITE AVALON OCP PROPRIETARY WB CHEADER CUSTOMCSV ERM HTML IDS_TURBO IPXACT IVSEXCELOUT OVM PDF PERL_DS PYTHON_DS SV SVG SVHEADER SYSTEMRDL UVM VERILOG VHDL VHDLALT2 VMM WORD2007 WORD2010 XRSL ADVD ALIAS CONSTRAINT COUNTER FIFO INDIRECT INTERRUPT LOCK MBD PARAM PREPROCESSOR PROPERTY_HINT ROWO SCS SHADOW SHAREPOINT SIGNALS STRUCT CPP SYSTEMC EXCEL VELOCITY MISRAC OUT_THIRD_PARTY_D C_API ARV FORMAL',

// );

// $myfile = fopen($file, "w") or die("Unable to open file!");

// fwrite($myfile, PHP_EOL . implode(PHP_EOL, $licFileData));
// fwrite($myfile, PHP_EOL . implode(PHP_EOL, $productData));

// fclose($myfile);

// unlink($file);

?>