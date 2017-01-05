#API PHP and MySQL

API to Read, Add, Query and Delete in MySQL database with PHP

##Application
• Connection with PHP and MySQL;<br>
• Simple and standardized data manipulation (Insert, Update, Delete and Query);<br>
• Facilitates jQuery call;<br>
• Currently the requests are by GET, but just change to POST if you want;<br>
• Allows the application and the database to be on different servers with jQuery calls.


##Installation
Place the file on the www/ root of the server where the database is hosted.


##File
• mysql/index.php


##Permission for Servers.
Domain authorized to access the bank <br>
<pre>
header('Access-Control-Allow-Origin: http://www.forum.zige.com.br');
</pre>


##PHP and MySQL connection data.
<pre>
$servidor= "localhost";
$bd_nome = "database";
$bd_user = "root";
$bd_senha= "pass";
</pre>


##Patterns
• <b>tbl</b> (Used in all calls, it should only contain the name of the main table for the request);<br>
• <b>order</b> (Used only in queries, determines the desired order of return);<br>
• <b>condition</b> (Your content changes depending on the type of request, so it is detailed in each step);<br>
• <b>field</b> (The fields of the entities that you want to enter or return).


##Insert data
<pre>
"INSERT INTO <b>$tbl</b> (<b>$campo</b>) VALUES (<b>$condi</b>)";
</pre>

##Update data
<pre>
"UPDATE <b>$tbl</b> SET <b>$campo</b> <b>$condi</b>";
</pre>

##Delete Data
<pre>
"DELETE FROM <b>$tbl</b> WHERE <b>$condi</b>";
</pre>

##Querying data
<pre>
"SELECT <b>$campo</b> FROM <b>$tbl $condi $order</b>";
</pre>
<b> Here in the condition ($ conditions) you can complete INNER queries.</b>

<b> Collaboration </b> <br>
@ <a href="https://github.com/RodolfoTerra"> RodolfoTerra</a>
