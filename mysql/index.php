<?php

/* Está parte só deve ser utilizada caso este arquivo fique em um servidor diferente do restante da aplicação */
header('Access-Control-Allow-Origin: http://www.forum.zige.com.br'); //Domínio autorizado a acessar o banco

class Gestor{

	function __construct(){

		$servidor= "localhost";	// Host do servidor de banco de dados geralmente (localhost ou 127.0.0.1)
		$bd_nome = "database"; 	// Nome do Banco de dados
		$bd_user = "root";		// Usuário do Banco de Dados
		$bd_senha= "pass";		// Senha do Banco de Dados

		$conectar = mysql_connect($servidor, $bd_user, $bd_senha); 
		$db = mysql_select_db($bd_nome, $conectar); 

		if(!$conectar) 
		{ 
			echo "erro ao conectar ao banco de dados!";
			exit();
		}

	}

	private function funcConsulta(){

		$tbls = $_GET['tbl'];
		$tbl = mysql_real_escape_string(addslashes($tbls));
		$order = '';
		$condi = '';
		$campos = $_GET['campo'];
		$campo = mysql_real_escape_string(addslashes($campos));

		if(isset($_GET['condi']))
		{
			$condis = $_GET['condi'];
			$condi = mysql_real_escape_string(addslashes($condis));
		}

		if(isset($_GET['or']))
		{
			$orders = $_GET['or'];
			$order = mysql_real_escape_string(addslashes($orders));
		}

		if(isset($_GET['fsaDe341']) and ($_GET['fsaDe341']=='wrtf567'))
		{
			$login = 'ok';
			$loginCond = $_GET['condi'];

			$loginExplode = explode('=', $loginCond);
			$login = explode('%', $loginExplode[0]);
			$email = $login[0];
			$senha = $login[1];
			
			$condi = "WHERE us_email='".$email."' AND 	us_senha='".$senha."'";
			//exit();
		}


		$query = "SELECT $campo FROM $tbl $condi $order";
		$tb_query = mysql_query($query) or die (mysql_error());


		while ($row = mysql_fetch_array($tb_query))  
		{
		 
		    $i=0;
		                 
		    foreach($row as $key => $value)    
		    {
		 
		        if (is_string($key)) 
		        {
		        	$fields[mysql_field_name($tb_query,$i++)] = $value;
		        }
		 
		    }
		 
		    $json_result["tabela"]["linha"][] = $fields;
		 
		}
		 
		/**/
		echo $JSON = json_encode($json_result);
	}

	function getConsulta(){
		$this->funcConsulta();
	}

	private function funcAtualizar(){

		$tbls = $_GET['tbl'];
		$tbl = mysql_real_escape_string(addslashes($tbls));
		$order = '';
		$condi = '';
		$campos = $_GET['campo'];
		$campo = mysql_real_escape_string(addslashes($campos));

		if(isset($_GET['condi']))
		{
			$condis = $_GET['condi'];
			$condi = mysql_real_escape_string(addslashes($condis));
		}

		$query = "UPDATE $tbl SET $campo $condi";
		$tb_query = mysql_query($query) or die (mysql_error());

	}

	function setAtualizar(){
		$this->funcAtualizar();
	}

	private function funcInserir(){

		$tbls = $_GET['tbl'];
		$tbl = mysql_real_escape_string(addslashes($tbls));
		$order = '';
		$condi = '';
		$campos = $_GET['campo'];
		$campo = mysql_real_escape_string(addslashes($campos));

		$query = "INSERT INTO $tbl ($campo) VALUES ($condi)";
		$tb_query = mysql_query($query) or die (mysql_error());

	}

	function setInserir(){
		$this->funcInserir();
	}

	private function funcDeletar(){

		$tbls = $_GET['tbl'];
		$tbl = mysql_real_escape_string(addslashes($tbls));
		$order = '';
		$condi = '';
		$campos = $_GET['campo'];
		$campo = mysql_real_escape_string(addslashes($campos));

		$query = "DELETE FROM $tbl WHERE $condi";
		$tb_query = mysql_query($query) or die (mysql_error());

	}

	function setDeletar(){
		$this->funcDeletar();
	}

}

/**/
//CONSULTA
if(isset($_GET['tbl']) and isset($_GET['campo'])){

	if(!isset($_GET['id']) and isset($_GET['ver'])){

		$verConsulta = new Gestor();
		echo $verConsulta->getConsulta();
	}
}

//ATUALIZA
if(isset($_GET['tbl']) and isset($_GET['campo'])){

	if(!isset($_GET['id']) and isset($_GET['atz'])){

		$setAtualizar = new Gestor();
		echo $setAtualizar->setAtualizar();
	}
}

//ADICIONA
if(isset($_GET['tbl']) and isset($_GET['campo'])){

	if(!isset($_GET['id']) and isset($_GET['add'])){

		$setInserir = new Gestor();
		echo $setInserir->setInserir();
	}
}

//DELETA
if(isset($_GET['tbl']) and isset($_GET['campo'])){

	if(!isset($_GET['id']) and isset($_GET['del'])){

		$setDeletar = new Gestor();
		echo $setDeletar->setDeletar();
	}
}
/**/