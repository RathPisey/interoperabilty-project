<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

// Get all transaction

$app->get('/api/transaction', function(Request $request, Response $response){

	$sql = "SELECT * FROM transaction";

	try{
		//Get DB Objects
		$db = new db();
		//Connect

		$db = $db->connect();

		$stmt = $db->query($sql);
		$transaction = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($transaction);

	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

// Get one transaction

$app->get('/api/transaction/{id}', function(Request $request, Response $response){

	$id = $request->getAttribute('id');

	$sql = "SELECT * FROM statetrans WHERE ID_trans = $id";

	try{
		//Get DB Objects
		$db = new db();
		//Connect

		$db = $db->connect();

		$stmt = $db->query($sql);
		$transaction1 = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($transaction1);

	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});