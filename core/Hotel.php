<?php namespace Evnts\Adm;

class Hotel extends BancoPDO {
	
	public $_hotel;
	public $_evento;
	public $_tipo_hospedagem;

	/**
	 * Construtor;
	 *
	 */
	function __construct() { 
		parent::__construct();
	}
	
	
	public function buscaHoteisEvento($ord){
		

		// Buscar a ordenaçao dos hoteis
		switch ($ord) {
		    case 'DIST':
		        // Se buscar por distancia
		        $_sql = sprintf("	SELECT h.id_hotel, h.titulo, h.tripadvisor, h.foto_capa, h.foto_alb, h.avaliacao, h.resumo, h.tripadvisor,
		        					h.caracteristicas, h.lat, h.lng, he.distancia, he.escassez, h.endereco 
									FROM evnts_hotel h, evnts_hotel_evento he
									WHERE he.id_evento = %d
									AND h.situacao LIKE 'A'
									AND he.id_hotel = h.id_hotel
									AND h.tipo_acomodacao <> %d
									ORDER BY he.distancia ASC;", $this->_evento, $this->_tipo_hospedagem);
		        break;

		    case 'MAXP':
		    	// Se buscar por quarto mais caro
		        $_sql = sprintf("	SELECT * 
									FROM evnts_hotel h, evnts_hotel_evento he, evnts_v_max_evento_quarto v
									WHERE v.id_evento = %d
									AND v.id_hotel = h.id_hotel
									AND v.id_evento = he.id_evento
									AND v.id_hotel = he.id_hotel
									AND h.situacao LIKE 'A'
									AND h.tipo_acomodacao <> %d
									ORDER BY v.quarto_max DESC;", $this->_evento, $this->_tipo_hospedagem);
		        break;

		    case 'MINP':
		    	// Se buscar por quarto mais barato
		        $_sql = sprintf("	SELECT * 
									FROM evnts_hotel h, evnts_hotel_evento he, evnts_v_min_evento_quarto v
									WHERE v.id_evento = %d
									AND v.id_hotel = h.id_hotel
									AND v.id_evento = he.id_evento
									AND v.id_hotel = he.id_hotel
									AND h.situacao LIKE 'A'
									AND h.tipo_acomodacao <> %d
									ORDER BY v.quarto_min ASC;", $this->_evento, $this->_tipo_hospedagem);
		        break;

		    case 'DESC':
		    	// Se buscar por quarto mais barato
		        $_sql = sprintf("SELECT *
								FROM evnts_hotel h, evnts_hotel_evento he, evnts_v_hotel_desconto v
								WHERE v.id_evento = %d
								AND v.id_hotel = h.id_hotel
								AND v.id_evento = he.id_evento
								AND v.id_hotel = he.id_hotel
								AND h.situacao LIKE 'A'
								AND h.tipo_acomodacao <> %d
								ORDER BY v.desconto DESC", $this->_evento, $this->_tipo_hospedagem);
		        break;

		    default:
				// Buscando os Hoteis relacionados a aquele evento:
				$_sql = sprintf("	SELECT h.id_hotel, h.titulo, h.tripadvisor, h.foto_capa, h.foto_alb, h.avaliacao, h.resumo, h.tripadvisor,
									h.caracteristicas, h.lat, h.lng, he.distancia, h.endereco, he.escassez
									FROM evnts_hotel h, evnts_hotel_evento he
									WHERE he.id_evento = %d
									AND h.situacao LIKE 'A'
									AND he.id_hotel = h.id_hotel
									AND h.tipo_acomodacao <> %d
									ORDER BY he.ordem ASC;", $this->_evento, $this->_tipo_hospedagem);
		}
		return parent::carrega($_sql);

	}

	public function retornaJSON(){


		$_sql = sprintf("	SELECT h.titulo, h.lat, h.lng, h.tipo_acomodacao, h.endereco, h.cidade 
							FROM evnts_hotel h, evnts_hotel_evento he
							WHERE he.id_evento = %d
							AND h.situacao like 'A'
							AND h.tipo_acomodacao <> %d
							AND he.id_hotel = h.id_hotel;", $this->_evento, $this->_tipo_hospedagem);

		return json_encode(parent::carrega($_sql));

	}

	public function buscaQuartos(){

		$_sql = sprintf("	SELECT hq.id_hotel, hq.id_quarto, hq.titulo, hq.texto_auxiliar, hq.capacidade, 
							hp.id_evento_quarto, hp.tarifa_cheia, hp.tarifa_evnts, hp.tarifa_evnts_fds 
							FROM evnts_evento_quarto_hotel_preco hp, evnts_hotel_quarto hq
							WHERE hp.id_quarto = hq.id_quarto
							AND hp.status LIKE 'A'
							AND hp.id_evento = %d
							AND hp.id_hotel = %d;", $this->_evento, $this->_hotel);

		//die($_sql);
		return parent::carrega($_sql);

	}

	public function buscaQuartoDefault(){

		$_sql = sprintf("	SELECT hp.id_evento_quarto, hq.id_hotel, hq.id_quarto, hq.titulo, hq.texto_auxiliar, hq.capacidade, 
							hp.id_evento_quarto, hp.tarifa_cheia, hp.tarifa_evnts, hp.tarifa_evnts_fds, 
							ev.data_fim, ev.data_inicio, DATEDIFF(ev.data_fim,ev.data_inicio) AS noites
							FROM evnts_evento_quarto_hotel_preco hp, evnts_hotel_quarto hq, evnts_evento ev
							WHERE hp.id_quarto = hq.id_quarto
							AND hp.status LIKE 'A'
							AND hp.id_evento = %d
							AND hp.id_hotel = %d 
							AND hp.data_vigencia > NOW() 
							AND hp.id_evento = ev.id_evento 
							AND ev.situacao LIKE 'A' LIMIT 1;", $this->_evento, $this->_hotel);
							

		//die($_sql);
		$arr =  parent::carrega_linha($_sql);

		// Verificando os finais de semana
		$arr_tarifa_normal 	= array();
		$arr_tarifa_fds 	= array();
		for ($d = $arr['data_inicio']; $d < $arr['data_fim']; $d = date('Y-m-d', strtotime($d. ' + 1 days'))) {
		
			$dia_semana = date("w", strtotime($d));
			if($dia_semana == 0 || $dia_semana == 6){
				$arr_tarifa_fds[] = $d;
			}
			else{
				$arr_tarifa_normal[] = $d;
			}

		}

		// Remontando o Array
		$arr['noites_semana'] 	= count($arr_tarifa_normal);
		$arr['noites_fds'] 		= count($arr_tarifa_fds);

		// Calculo do valor total
		if(!is_null($arr["tarifa_evnts_fds"])){

			$valor_total = ($arr['noites_fds'] * $arr['tarifa_evnts_fds']) + ($arr['noites_semana'] * $arr['tarifa_evnts']); 	

		}
		else{

			$valor_total = $arr['noites'] * $arr['tarifa_evnts'];

		}	
		// Calculo do valor por pessoa
		$valor_pessoa = $valor_total / $arr['capacidade'];

		$arr['valor_total'] = number_format($valor_total, 2, ',', '');
		$arr['valor_pessoa'] = number_format($valor_pessoa, 2, ',', '');

		return $arr;

	}

	public function buscaQuartosEvento($ord){

		// Buscando quartos de cada hotel:
		if($ord == 'MAXP'){

			$_sql = sprintf("	SELECT hp.id_hotel, hq.id_quarto, hq.titulo, hq.texto_auxiliar, hq.capacidade, 
								hp.tarifa_cheia, hp.tarifa_evnts, hp.tarifa_evnts_fds, hp.status 
								FROM evnts_evento_quarto_hotel_preco hp, evnts_hotel_quarto hq
								WHERE hp.id_quarto = hq.id_quarto
								AND hp.status NOT LIKE 'S'
								AND hp.id_evento = %d
								AND hp.data_vigencia > NOW()
								ORDER BY hp.status, hp.id_hotel, hp.tarifa_evnts DESC;", $this->_evento);

		}
		else{

			$_sql = sprintf("	SELECT hp.id_hotel, hq.id_quarto, hq.titulo, hq.texto_auxiliar, hq.capacidade, 
								hp.tarifa_cheia, hp.tarifa_evnts, hp.tarifa_evnts_fds, hp.status  
								FROM evnts_evento_quarto_hotel_preco hp, evnts_hotel_quarto hq
								WHERE hp.id_quarto = hq.id_quarto
								AND hp.status NOT LIKE 'S'
								AND hp.id_evento = %d
								AND hp.data_vigencia > NOW()
								ORDER BY hp.status, hp.tarifa_evnts ASC;", $this->_evento);
		}
		
		//die($_sql); 
		// Reorganizando os quartos ID Hotel -> ID Quarto -> Info	
		$arr_quartos_ordenado 	= array();
		$arr_quartos 			= parent::carrega($_sql);

		foreach ($arr_quartos as $_quarto) {

			$arr_quartos_ordenado[$_quarto["id_hotel"]][$_quarto["id_quarto"]] = $_quarto;

		}

		return $arr_quartos_ordenado;

	}


	public function retornaDescontos(){

		//
		//$_sql = sprintf("	SELECT id_hotel, MAX(round(100*(1-tarifa_evnts/tarifa_cheia))) AS desconto
		//					FROM evnts_evento_quarto_hotel_preco 
		//					WHERE tarifa_cheia iS NOT NULL AND id_evento = %d
		//					GROUP BY id_hotel;", $this->_evento);

		$_sql = sprintf("	SELECT id_hotel, desconto FROM evnts_v_hotel_desconto
							 WHERE id_evento = %d
							   AND desconto IS NOT NULL;", $this->_evento);	  	

		$_arr = parent::carrega($_sql);

		// Reordenando
		
		$_arr_final = array();
		if(!empty($_arr)){

			foreach ($_arr as $chave => $valor) {
				$_arr_final[$valor["id_hotel"]] = $valor["desconto"];
			}

		}

		return $_arr_final;
	}

	public function retornaDesconto(){

		$_sql = sprintf("	SELECT MAX(round(100*(1-tarifa_evnts/tarifa_cheia))) AS desconto
							FROM evnts_evento_quarto_hotel_preco 
							WHERE tarifa_cheia iS NOT NULL AND id_evento = %d
							AND id_hotel = %d;", $this->_evento, $this->_hotel);

		$_arr =  parent::carrega_linha($_sql);

		if(!empty($_arr))
			return $_arr["desconto"];
		else
			return 0;

	}


	public function buscaHoteisQuartosEvento($ord, $qtd=4){

		$arr_hoteis 		= $this->buscaHoteisEvento($ord);
		$arr_quartos 		= $this->buscaQuartosEvento($ord);
		$arr_desconto		= $this->retornaDescontos();
		$arr_hoteis_quartos = array();

		foreach ($arr_hoteis as $chave => $hotel) {
			
			$arr_hoteis_quartos[$chave] = $hotel;
	
			// Verificar se existe o indice e entao atribuir
			if(isset($arr_quartos[$hotel["id_hotel"]]) && sizeof($arr_quartos[$hotel["id_hotel"]])){	
				$arr_hoteis_quartos[$chave]["quarto"] = array_slice($arr_quartos[$hotel["id_hotel"]], 0, $qtd);
			}
			else{
				$arr_hoteis_quartos[$chave]["quarto"] = array();
			}

			// Album de fotos
			$arr_hoteis_quartos[$chave]["album"] = explode("|", $hotel["foto_alb"]);

			// Colocando os descontos
			if(isset($arr_desconto[$hotel["id_hotel"]])){	
				$arr_hoteis_quartos[$chave]["desconto_auto"] = $arr_desconto[$hotel["id_hotel"]];
			}
			else{
				$arr_hoteis_quartos[$chave]["desconto_auto"] = 0;
			}

		}

		//var_dump($arr_hoteis_quartos); exit;
		return $arr_hoteis_quartos;

	}

	public function listaHotel(){
	
		$_sql = sprintf("SELECT h.id_hotel, h.titulo, h.tipo_acomodacao, h.cidade FROM evnts_hotel h;");
		return parent::carrega($_sql);

	}

	public function buscaHotelEvento(){

		$_sql = sprintf("	SELECT h.id_hotel, h.tripadvisor, h.titulo, h.telefone, h.email, h.iss, h.avaliacao, h.foto_alb, h.resumo, h.horario_entrada, h.horario_saida,
							h.caracteristicas, h.lat AS hotel_lat, h.lng AS hotel_lng, DATEDIFF(evn.data_fim,evn.data_inicio) AS diarias, 
							DATE_FORMAT(evn.data_inicio, '%%d/%%m/%%Y') as data_inicio, DATE_FORMAT(evn.data_fim, '%%d/%%m/%%Y') as data_fim, 
							evn.lat AS evento_lat, evn.lng AS evento_lng, evn.titulo AS evento_titulo, he.distancia, h.endereco, 
							he.deslocamento, he.escassez 
							FROM evnts_hotel h, evnts_hotel_evento he, evnts_evento evn
							WHERE he.id_evento = %d
							AND he.id_hotel = %d
							AND h.situacao LIKE 'A'
							AND he.id_hotel = h.id_hotel
							AND evn.id_evento = he.id_evento;", $this->_evento, $this->_hotel);

		// Carregando a linha;
		$_arr_evento_hotel = parent::carrega_linha($_sql);

		// Alterando Album de fotos String -> Array
		if(!empty($_arr_evento_hotel["foto_alb"])){
			$_arr_evento_hotel["album"] = explode("|", $_arr_evento_hotel["foto_alb"]);
		}
		else{
			$_arr_evento_hotel["album"] = array();	
		}

		// Buscando o desconto
		$_arr_evento_hotel["desconto"] = $this->retornaDesconto();

		// Alterando Int -> String para o Google Maps
		if($_arr_evento_hotel["deslocamento"] == 1){
			$_arr_evento_hotel["deslocamento"] = "driving";
		}
		else{
			$_arr_evento_hotel["deslocamento"] = "walking";
		}

		return $_arr_evento_hotel;

	}

	public function buscaQuarto($id_quarto){

		$_sql = sprintf("	SELECT hq.id_hotel, hq.id_quarto, hq.titulo, hq.texto_auxiliar, hq.capacidade, hp.tarifa_cheia, hp.tarifa_evnts, hp.tarifa_evnts_fds  
							FROM evnts_evento_quarto_hotel_preco hp, evnts_hotel_quarto hq
							WHERE hp.id_quarto = hq.id_quarto
							AND hp.status LIKE 'A'
							AND hp.data_vigencia > NOW()
							AND hp.id_quarto = %d;", $id_quarto);

		return parent::carrega_linha($_sql);

	}


	public function buscaHotel(){

		$_sql = sprintf("SELECT * 
						   FROM evnts_hotel
						  WHERE id_hotel = %d;", $this->_hotel);

		// Carregando a linha;
		return parent::carrega_linha($_sql);

	}

	public function buscaHotelQuartos(){

		$_sql = sprintf("SELECT *
				 		   FROM evnts_hotel_quarto
						  WHERE id_hotel = %d;", $this->_hotel);

		return parent::carrega($_sql);

	}



	
}