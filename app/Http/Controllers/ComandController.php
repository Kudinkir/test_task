<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resourse\Invoker;
use App\Http\Resourse\SimpleCommand;
use App\Http\Resourse\Receiver;
use App\Http\Resourse\ComplexCommand;
use GuzzleHttp\Client; 
// use GuzzleHttp\ClientInterface;
// use GuzzleHttp\Exception\RequestException;


class ComandController extends Controller
{
	public function index(){
		$invoker = new Invoker();
		$invoker->setOnStart(new SimpleCommand("Say Hi!"));
		$receiver = new Receiver();
		$invoker->setOnFinish(new ComplexCommand($receiver, "Send email", "Save report"));
		$invoker->doSomethingImportant();
	}

	public function guzzles(){
		$client = new Client(); 
		$request = $client->get('http://jsonplaceholder.typicode.com/posts/1');
		$result = $request->getBody()->getContents();
		dd($result);
		
		// $body = json_decode($response->getBody(), TRUE);
	 //    $content = view('retrieve')->with('body',$body);
		// return View::make($content);
	}
	

}
