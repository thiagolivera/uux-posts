<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script>

//função para pegar o objeto ajax do navegador
function xmlhttp()
{
	// XMLHttpRequest para firefox e outros navegadores
	if (window.XMLHttpRequest)
	{
		return new XMLHttpRequest();
	}

	// ActiveXObject para navegadores microsoft
	var versao = ['Microsoft.XMLHttp', 'Msxml2.XMLHttp', 'Msxml2.XMLHttp.6.0', 'Msxml2.XMLHttp.5.0', 'Msxml2.XMLHttp.4.0', 'Msxml2.XMLHttp.3.0','Msxml2.DOMDocument.3.0'];
	for (var i = 0; i < versao.length; i++)
	{
		try
		{
			return new ActiveXObject(versao[i]);
		}
		catch(e)
		{
			alert("Seu navegador não possui recursos para o uso do AJAX!");
		}
	} // fecha for
	return null;
} // fecha função xmlhttp

//função para fazer a requisição da página que efetuará a consulta no DB
function carregar()
{
   a = document.getElementById('busca').value;
   ajax = xmlhttp();
   if (ajax)
   {
	   ajax.open('get','busca.php?busca='+a, true);
	   ajax.onreadystatechange = trazconteudo; 
	   ajax.send(null);
   }
}

//função para incluir o conteúdo na pagina
function trazconteudo()
{
	if (ajax.readyState==4)
	{
		if (ajax.status==200)
		{
			document.getElementById('resultados').innerHTML = ajax.responseText;
		}
	}
}

</script>
</head>

<body>
<form id="form1" action="" method="post">
	Busca: <input type="text" name="busca" id="busca" value="" onkeyUp="carregar()"/>
</form>
<p> </p>
Resultado da busca:
<div id="resultados" style="border:1px solid #CCCCCC; width:200px;">

</div>
</body>
</html>

<?php
	mysql_connect("localhost","root","");
	mysql_select_db("pesquisa");
	
	$busca = $_GET['busca'];

	if($busca != "") {
		$sql = "SELECT * FROM cadastros WHERE cadastro LIKE '%$busca%' ORDER BY cadastro ASC ";
		$query = mysql_query($sql);
		
		//variavel para zebrar as linhas
		$cont = 0;
		while($row = mysql_fetch_object($query)) {
			//faz a diferenciação das cores para as linhas dos resultados
			if($cont %2 ==0) {
				$cor = "#EDEDED";
			} else {
				$cor = "#FFFFFF";
			}
			echo "<div style='background:$cor'>";
			echo $row->idcadastro. " - ";
			echo $row->cadastro."<br>";
			echo "</div>";
			$cont ++;
		}
	}
?>