<?php

require 'PayPal-PHP-SDK/autoload.php';
define('URL_SITIO','http://localhost/proyecto-curso');

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AQj8n8HeTA90ET5FlFMl19VaqC-q2TnpsWCpuA1NsAmFHuT9z2mTaAPcIVwNfOJ50h4GoSOC3Ua27bca', //ClientID
        'EIL_NIvCsVfxDmOcDLboL0cu4BwQgVjQg9MwgL6B6ciBZ15XEYyE83PUEt0cN3etKb8_spIl82ZCpIgV'  //Secret
    )
);

