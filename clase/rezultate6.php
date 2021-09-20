<html>
 <head>
   <title>Afisare nave din clasa Ticonderoga</title>
   <style>
    table, th, td
	{
		border: 1px solid black;
	}
   </style>
  </head>
<body bgcolor="orange">
  <h1 align="center">Afisare nave din clasa Ticonderoga</h1>
<?php
require_once("Bibl.php");
// creare variabile cu nume scurte
$clasa=$_POST['clasa'];
$clasa= trim($clasa);
if (!$clasa)
{
echo '<p style="font-size:20px;"><b>Nu ati introdus criteriul de cautare. Va rog sa incercati din nou.</b></p>';
revenire('autorizati6.php', "15%");
}
if (!get_magic_quotes_gpc())
{
$clasa = addslashes($clasa);
}
// se stabileşte şirul pentru conexiune universală sau DSN
$dsn=con_bd();
$result=query6($dsn, $clasa);
// se obţine numărul tuplelor returnate
$num_results = mysqli_num_rows($result);
// se afişează fiecare tuplă returnată
echo ' <Table style = "width:100%">
<tr>
 <th bgcolor="aqua">Nr.crt.</th>
 <th bgcolor="aqua">Nava</th>
 <th bgcolor="aqua">Batalie</th>
 <th bgcolor="aqua">Data</th>
 <th bgcolor="aqua">Locatie</th>
</tr>'; 
for ($i=0; $i <$num_results; $i++)
{
$row = mysqli_fetch_assoc($result);

echo '<tr><td align="center" bgcolor="aqua">'.($i+1).'</td>';
echo '<td align="center" bgcolor="aqua">'.htmlspecialchars(stripslashes($row['nume'])).'</td>';
echo '<td align="center" bgcolor="aqua">'.stripslashes($row['batalie']).'</td>';
echo '<td align="center" bgcolor="aqua">'.stripslashes($row['data']).'</td>';
echo '<td align="center" bgcolor="aqua">'.stripslashes($row['locatie']).'</td>';

}
echo '</table>';

revenire('autorizati6.php', "50%");
// deconectarea de la BD
mysqli_close($dsn);
?>
</body>
</html>