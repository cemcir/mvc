<?php
    define('MAIN_DIRECTORY','../..'); //ana dizin
    global $config;

    $config=
    [
        "home"=>
        [
            "modul"=>"defaults",  //url ye http://mvc dediğimizde varsayılan olarak gidecek controller
            "method"=>"index"
        ]
    ];

    global $httpStatusCode; //durum kodları
    
    $httpStatusCode=[
        'Continue'=>100,  
        'SwitchingProtocols'=>101,  
        'OK'=>200,
        'Created'=>201,  
        'Accepted'=>202,  
        'Non-AuthoritativeInformation'=>203,  
        'NoContent'=>204,  
        'ResetContent'=>205,  
        'PartialContent'=>206,  
        'MultipleChoices'=>300,  
        'MovedPermanently'=>301,  
        'Found'=>302,  
        'SeeOther'=>303,  
        'NotModified'=>304,  
        'UseProxy'=>305,  
        '(Unused)'=>306,  
        'Temporary Redirect'=>307,  
        'BadRequest'=>400,  
        'Unauthorized'=>401,  
        'PaymentRequired'=>402,  
        'Forbidden'=>403,  
        'NotFound'=>404,  
        'MethodNotAllowed'=>405,  
        'Not Acceptable'=>406,  
        'ProxyAuthentication Required'=>407,  
        'RequestTimeout'=>408,  
        'Conflict'=>409,  
        'Gone'=>410,  
        'LengthRequired'=>411,  
        'PreconditionFailed'=>412,  
        'RequestEntityTooLarge'=>413,  
        'Request-URITooLong'=>414,  
        'UnsupportedMediaType'=>415,  
        'RequestedRangeNotSatisfiable'=>416,  
        'ExpectationFailed'=>417, 
        'UnprocessableEntity'=>422, 
        'InternalServerError'=>500,  
        'NotImplemented'=>501,  
        'BadGateway'=>502,  
        'ServiceUnavailable'=>503,  
        'GatewayTimeout'=>504,  
        'HTTPVersionNotSupported'=>505
    ];
?>
