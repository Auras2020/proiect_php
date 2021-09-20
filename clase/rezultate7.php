<html>
 <head>
   <title>Afisare crucisatoare cu cele mai mari tunuri</title>
   <style>
    table, th, td
	{
		border: 1px solid black;
	}
   </style>
  </head>
<body bgcolor="orange">
  <h1 align="center">Afisare crucisatoare cu cele mai mari tunuri</h1>
<?php
require_once("Bibl.php");
// creare variabile cu nume scurte
$tip=$_POST['tip'];
$tip= trim($tip);
if (!$tip)
{
echo '<p style="font-size:20px;"><b>Nu ati introdus criteriul de cautare. Va rog sa incercati din nou.</b></p>';
revenire('autorizati7.php', "15%");
}
if (!get_magic_quotes_gpc())
{
$tip = addslashes($tip);
}
// se stabileşte şirul pentru conexiune universală sau DSN
$dsn=con_bd();
$result=query7($dsn, $tip);
// se obţine numărul tuplelor returnate
$num_results = mysqli_num_rows($result);
// se afişează fiecare tuplă returnată
echo ' <Table style = "width:100%">
<tr>
 <th bgcolor="aqua">Nr.crt.</th>
 <th bgcolor="aqua">Tara</th>
 <th bgcolor="aqua">Clasa</th>
</tr>'; 
for ($i=0; $i <$num_results; $i++)
{
$row = mysqli_fetch_assoc($result);

echo '<tr><td align="center" bgcolor="aqua">'.($i+1).'</td>';
echo '<td align="center" bgcolor="aqua">'.htmlspecialchars(stripslashes($row['tara'])).'</td>';
echo '<td align="center" bgcolor="aqua">'.stripslashes($row['clasa']).'</td>';

}
echo '</table>';

revenire('autorizati7.php', "50%");
// deconectarea de la BD
mysqli_close($dsn);
?>
</body>
</html>