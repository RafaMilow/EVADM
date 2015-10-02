<?php namespace Evnts\Adm;

class Evento extends BancoPDO {
	

	public $_evento;

	/**
	 * Construtor;
	 *
	 */
	function __construct($evento) { 
		
		$this->_evento = $evento;
		parent::__construct();
		
	}
	

	public function getEvento(){
		return $this->_evento;
	}


	public function buscaTodos(){

		$_sql = sprintf("	SELECT id_evento, titulo, cidade, local, data_inicio, data_fim
							  FROM evnts_evento 
							 WHERE situacao like 'A'
						  ORDER BY data_inicio;");

		//die($_sql);
		return parent::carrega($_sql);

	}

	public function buscaEventoMaisRecente(){

		$_sql = sprintf("	SELECT 	id_evento, titulo, chamada_1, chamada_2, CTA, CTA_DETALHE, 
									data_inicio, data_fim, lat, lng, zoom, logomarca, click2call, endereco, cidade, local 
							FROM evnts_evento 
							WHERE situacao like 'A'
							AND data_inicio > NOW() ORDER BY data_inicio LIMIT 1;");

		//die($_sql);
		return parent::carrega_linha($_sql);

	}

	public function buscaEvento(){

		$_sql = sprintf("	SELECT 	id_evento, titulo, chamada_1, chamada_2, CTA, CTA_DETALHE, 
									data_inicio, data_fim, lat, lng, zoom, logomarca, click2call, endereco, cidade, local 
							FROM evnts_evento
							WHERE id_evento = %d 
							AND situacao like 'A';", $this->_evento);

		//die($_sql);
		$retorno_sql = parent::carrega_linha($_sql);
		
		if(is_bool($retorno_sql)){
			return array();	
		}
		else{
			return $retorno_sql;
		}

		 

	}

	public function retornaJSON(){

		$_sql = sprintf("	SELECT id_evento, titulo, data_inicio, data_fim, lat, lng, endereco, cidade, local, zoom
							FROM evnts_evento
							WHERE id_evento = %d 
							AND situacao like 'A';", $this->_evento);

		$retorno_sql = parent::carrega_linha($_sql);

		return json_encode($retorno_sql);

	}

	public function buscaTipoAcomodacoes(){

		$_sql = sprintf("	SELECT COUNT(DISTINCT(h.tipo_acomodacao)) AS tipos 
							FROM evnts_hotel h, evnts_hotel_evento he
							WHERE he.id_evento = %d
							AND h.situacao like 'A'
							AND he.id_hotel = h.id_hotel;", $this->_evento);

		$arr = parent::carrega_linha($_sql);
		return (int)$arr["tipos"];

	}
	
}