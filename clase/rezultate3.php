<html>
 <head>
   <title>Afisare nave</title>
   <style>
    table, th, td
	{
		border: 1px solid black;
	}
   </style>
  </head>
<body bgcolor="orange">
  <h1 align="center">Afisare nave</h1>
<?php
require_once("Bibl.php");
// creare variabile cu nume scurte
$nume=$_POST['nume'];
$nume= trim($nume);
if (!$nume)
{
echo '<p style="font-size:20px;"><b>Nu ati introdus criteriul de cautare. Va rog sa incercati din nou.</b></p>';
revenire('autorizati3.php', "15%");
}
if (!get_magic_quotes_gpc())
{
$nume = addslashes($nume);
}
// se stabileşte şirul pentru conexiune universală sau DSN
$dsn=con_bd();
$result=query3($dsn, $nume);
// se obţine numărul tuplelor returnate
$num_results = mysqli_num_rows($result);
// se afişează fiecare tuplă returnată
echo ' <Table style = "width:100%">
<tr>
 <th bgcolor="aqua">Nr.crt.</th>
 <th bgcolor="aqua">Nava</th>
 <th bgcolor="aqua">Deplasament</th>
 <th bgcolor="aqua">Numar arme</th>
</tr>'; 
for ($i=0; $i <$num_results; $i++)
{
$row = mysqli_fetch_assoc($result);

echo '<tr><td align="center" bgcolor="aqua">'.($i+1).'</td>';
echo '<td align="center" bgcolor="aqua">'.htmlspecialchars(stripslashes($row['nume'])).'</td>';
echo '<td align="center" bgcolor="aqua">'.stripslashes($row['deplasament']).'</td>';
echo '<td align="center" bgcolor="aqua">'.stripslashes($row['nr_arme']).'</td>';

}
echo '</table>';

revenire('autorizati3.php', "50%");
// deconectarea de la BD
mysqli_close($dsn);
?>
</body>
</html>