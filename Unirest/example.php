<?php



require_once 'v304//Unirest.php';


/**
 *
 * @source https://github.com/Mashape/unirest-php
 *
 * Request Object
 *
 *    Unirest\Request::get($url, $headers = array(), $parameters = null)
 *    Unirest\Request::post($url, $headers = array(), $body = null)
 *    Unirest\Request::put($url, $headers = array(), $body = null)
 *    Unirest\Request::patch($url, $headers = array(), $body = null)
 *    Unirest\Request::delete($url, $headers = array(), $body = null)
 *
 * Response Object
 *
 * Upon recieving a response Unirest returns the result in the form of an Object,
 * this object should always have the same keys for each language regarding to the response details.
 *
 *    code - HTTP Response Status Code (Example 200)
 *    headers - HTTP Response Headers
 *    body - Parsed response body where applicable, for example JSON responses are parsed to Objects / Associative Arrays.
 *    raw_body - Un-parsed response body
 *
 * SSL validation
 *
 * You can explicitly enable or disable SSL certificate validation when consuming an SSL protected endpoint:
 * Default: true
 *
 *    Unirest\Request::verifyPeer(false); // Disables SSL cert validation
 *
 *
 * Utility Methods
 *
 *    // alias for `curl_getinfo`
 *    Unirest\Request::getInfo()
 *
 *    // returns internal cURL handle
 *    Unirest\Request::getCurlHandle()
 */

/*--------------------------------------------------------------
   Authentication
--------------------------------------------------------------*/
// First, if you are using Mashape:

// Mashape auth
Unirest\Request::setMashapeKey('<mashape_key>');

// Otherwise, passing a username, password (optional), defaults to Basic Authentication:
// basic auth
Unirest\Request::auth('username', 'password');


/*--------------------------------------------------------------
   Creating a request
--------------------------------------------------------------*/

$headers = array('Accept' => 'application/json');
$query = array('foo' => 'hello', 'bar' => 'world');

$response = Unirest\Request::post('http://mockbin.com/request', $headers, $query);

$response->code;        // HTTP Status code
$response->headers;     // Headers
$response->body;        // Parsed body
$response->raw_body;    // Unparsed body



/*--------------------------------------------------------------
   JSON Request (application/json)
--------------------------------------------------------------*/
$headers = array('Accept' => 'application/json');
$data = array('name' => 'ahmad', 'company' => 'mashape');

$body = Unirest\Request\Body::json($data);

$response = Unirest\Request::post('http://mockbin.com/request', $headers, $body);


/*--------------------------------------------------------------
   Form Request  (application/x-www-form-urlencoded)
--------------------------------------------------------------*/
$headers = array('Accept' => 'application/json');
$data = array('name' => 'ahmad', 'company' => 'mashape');

$body = Unirest\Request\Body::form($data);

$response = Unirest\Request::post('http://mockbin.com/request', $headers, $body);


/*--------------------------------------------------------------
  Multipart Requests (multipart/form-data)

  A Multipart Request can be constructed using the Unirest\Request\Body::Multipart helper:
--------------------------------------------------------------*/
$headers = array('Accept' => 'application/json');
$data = array('name' => 'ahmad', 'company' => 'mashape');

$body = Unirest\Request\Body::multipart($data);

$response = Unirest\Request::post('http://mockbin.com/request', $headers, $body);

/*--------------------------------------------------------------
  Multipart File Upload

  simply add an array of files as the second argument to to the Multipart helper:
--------------------------------------------------------------*/

$headers = array('Accept' => 'application/json');
$data = array('name' => 'ahmad', 'company' => 'mashape');
$files = array('bio' => '/path/to/bio.txt', 'avatar' => '/path/to/avatar.jpg');

$body = Unirest\Request\Body::multipart($data, $files);

$response = Unirest\Request::post('http://mockbin.com/request', $headers, $body);
