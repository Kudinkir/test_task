<?php

namespace App\Http\Resourse;

use GuzzleHttp\Client; 

 /**
 * The Receiver classes contain some important business logic. They know how to
 * perform all kinds of operations, associated with carrying out a request. In
 * fact, any class may serve as a Receiver.
 */
 

 //Это список конечных команд
class Receiver
{
	protected function _response($url, $type){
		$client = new Client(); 
		$request = $client->$type('http://jsonplaceholder.typicode.com/'.$url);
		return $request->getBody()->getContents(); 
	}
	public function __call($method, $args) {
      if(in_array($method, ['create', 'update', 'delete', 'get'])) {
      		$args[] = $method;
      		print("You use method ".$method);
      		print_r("For object ". $args[0]."\n");
      		print call_user_func_array(array($this, '_response'), $args);  
      }
      echo "unknown method " . $method;
      return false;
  }

}