#API PHP e MySQL

API para Ler, Adicionar, Consultar e Deletar em banco de dados MySQL com PHP

##Aplicação
•	Conexão com PHP e MySQL;<br>
•	Manipulação de dados simples e padronizada (Inserir, Atualizar, Deletar e Consultar);<br>
•	Facilita a chamada por jQuery;<br>
•	Atualmente as requisições estão por GET, mas basta alterar para POST caso queira;<br>
•	Permite que a aplicação e o banco estejam em servidores diferentes com chamadas em jQuery.<br>


##Instalação
Coloque o arquivo na raiz www/ do servidor onde está hospedado o banco de dados.<br>


##Arquivo
•	mysql/index.php


##Permissão de servidores.
Domínio autorizado a acessar o banco<br>
<pre>
header('Access-Control-Allow-Origin: http://www.forum.zige.com.br');
</pre>


##Dados de conexão PHP e MySQL.
<pre>
$servidor= "localhost";
$bd_nome = "database";
$bd_user = "root";
$bd_senha= "pass";
</pre>


##Variaveis padrões
•	<b>tbl</b> (Utilizada em todos as chamadas, deve conter apenas o nome da tabela principal para a requisição);<br>
•	<b>order</b> (Utilizada apenas em consultas, determina a ordem desejada do retorno);<br>
•	<b>condi</b> (Seu conteúdo muda conforme o tipo de requisição, por isso está detalhada em cada etapa);<br>
•	<b>campo</b> (Os campos das entidades que deseja inserir ou obter de retorno).<br>


##Inserir dados
<pre>
"INSERT INTO <b>$tbl</b> (<b>$campo</b>) VALUES (<b>$condi</b>)";
</pre>

##Atulizar dados
<pre>
"UPDATE <b>$tbl</b> SET <b>$campo</b> <b>$condi</b>";
</pre>

##Deletar dados
<pre>
"DELETE FROM <b>$tbl</b> WHERE <b>$condi</b>";
</pre>

##Consultar dados
<pre>
"SELECT <b>$campo</b> FROM <b>$tbl $condi $order</b>";
</pre>
<b>Aqui na condição ($condi) você pode completar relacionamentos INNER a consulta.</b>

<b>Colaboração</b><br>
@<a href="https://github.com/RodolfoTerra">RodolfoTerra</a>
