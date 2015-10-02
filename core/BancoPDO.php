<?php namespace Evnts\Adm;

use \PDO;

class BancoPDO extends PDO 
{
	
    function __construct() {
		
		$DSN = sprintf("mysql:host=%s;dbname=%s;charset=utf8","localhost","evnts");
    	//$DSN = sprintf("mysql:host=%s;dbname=%s;charset=utf8","mysql.evnts.com.br","db_hoteisevents");
    	//$DSN = sprintf("mysql:host=%s;dbname=%s;charset=utf8","mysql.evnts.com.br","db_teste_evnts");

		parent::__construct($DSN, "root", "milowrlz");
		//parent::__construct($DSN, "evntscombr", "wnSgVEH?");
		parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		return $this;
		
	}

	public function executa_query($sql,$retorno=false){
		
		try{
			
			$stmt = parent::prepare($sql);	
			$stmt->execute();

			// Caso retorno seja 'true' retorno as colunas modificadas;
			if($retorno){
				return $stmt->fetchColumn();
				//return $stmt->lastInsertId();
			}
			
		} 
		catch( PDOException $e ){
			
			$arrErro = $e->errorInfo;
			print_r($e);
			exit;
			
		}
			

	}


	public function executa_query2($sql,$_VAR,$retorno=false){
		
		try{
			
			$stmt = parent::prepare($sql);

			// na hora de fazer bind fica mais claro qual variável vai aonde
			$stmt->bindValue(":nome", $_VAR["cliente_nome"]);
			$stmt->bindValue(":sobrenome", $_VAR["cliente_sobrenome"]);
			$stmt->bindValue(":email", $_VAR["cliente_email"]);
			$stmt->bindValue(":telefone", $_VAR["cliente_telefone"]);
			$stmt->bindValue(":pedido_especial", $_VAR["pedido_especial"]);
			$stmt->bindValue(":qtd_hospedes", $_VAR["capacidade_escolhida"]);
			$stmt->bindValue(":data_entrada", $_VAR["data_entrada"]);
			$stmt->bindValue(":data_saida", $_VAR["data_saida"]);
			$stmt->bindValue(":id_quarto", $_VAR["tipo_quarto"]);
			$stmt->bindValue(":id_evento", $_VAR["id_evento"]);
			$stmt->bindValue(":hospedes", $_VAR["hospedes"]);
			$stmt->bindValue(":cliente_titulo", $_VAR["cliente_titulo"]);

			$stmt->execute();

			// Caso retorno seja 'true' retorno as colunas modificadas;
			if($retorno){
				return $stmt->fetchColumn();
				//return $stmt->lastInsertId();
			}
			
		} 
		catch( PDOException $e ){
			
			$arrErro = $e->errorInfo;
			print_r($e);
			exit;
			
		}
			
		return true;
	}


	public function executa_query_hotel($sql,$_VAR,$retorno=false){
		
		try{
			
			$stmt = parent::prepare($sql);

			// na hora de fazer bind fica mais claro qual variável vai aonde
			$stmt->bindValue(":nome", $_VAR["cliente_nome"]);
			$stmt->bindValue(":sobrenome", $_VAR["cliente_sobrenome"]);
			$stmt->bindValue(":email", $_VAR["cliente_email"]);
			$stmt->bindValue(":telefone", $_VAR["cliente_telefone"]);
			$stmt->bindValue(":pedido_especial", $_VAR["pedido_especial"]);
			$stmt->bindValue(":qtd_hospedes", $_VAR["capacidade_escolhida"]);
			$stmt->bindValue(":data_entrada", $_VAR["data_entrada"]);
			$stmt->bindValue(":data_saida", $_VAR["data_saida"]);
			$stmt->bindValue(":id_quarto", $_VAR["tipo_quarto"]);
			$stmt->bindValue(":id_evento", $_VAR["id_evento"]);
			$stmt->bindValue(":hospedes", $_VAR["hospedes"]);
			$stmt->bindValue(":cliente_titulo", $_VAR["cliente_titulo"]);

			$stmt->execute();

			// Caso retorno seja 'true' retorno as colunas modificadas;
			if($retorno){
				return $stmt->fetchColumn();
				//return $stmt->lastInsertId();
			}
			
		} 
		catch( PDOException $e ){
			
			$arrErro = $e->errorInfo;
			print_r($e);
			exit;
			
		}
			

	}



	
	
	/**
	 * Carrega os valores para a formação
	 * do objeto;
	 *
	 */
	public function carrega($sql){
		
		try {	

			$result = parent::query($sql);
			$row 	= $result->fetchAll(PDO::FETCH_ASSOC);
			
			// Retorno;
			return $row;
			
		}
		catch (PDOException $e) {
   			return array();
		}
		
	}	
	

	/**
	 * Carrega os valores para a formação
	 * do objeto;
	 *
	 */
	public function carrega_unique($sql,$debug=false){
		
		if($debug === true)
			die($sql);
			
		try {	
			//die($sql);
			$result = parent::query($sql);
			$row 	= $result->fetchAll(\PDO::FETCH_GROUP|\PDO::FETCH_UNIQUE);
			
			// Retorno;
			return $row;
			
		}
		catch (PDOException $e) {
   			return array();
		}
		
	}	


	/**
	 * Carrega os valores para a formação
	 * do objeto;
	 *
	 */
	public function carrega_agrupado($sql,$debug=false){
		
		if($debug === true)
			die($sql);
			
		try {	
			//die($sql);
			$result = parent::query($sql);
			$row 	= $result->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_GROUP);
			
			// Retorno;
			return $row;
			
		}
		catch (PDOException $e) {
   			return array();
		}
		
	}	



	/**
	 * Carrega os valores para a formação
	 * do objeto;
	 *
	 */
	public function carrega_linha($sql,$debug=false){
		
		if($debug === true)
			die($sql);
			
		try {	
			//die($sql);
			$result = parent::query($sql);
			$row 	= $result->fetch(PDO::FETCH_ASSOC);
			
			// Retorno;
			if(!empty($row))
				return $row;
			else
				return array();

			
		}
		catch (PDOException $e) {
   			return array();
		}
		
	}	



} 