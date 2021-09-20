<html>
 <head>
   <title>Afisare batalii</title>
   <style>
    table, th, td
	{
		border: 1px solid black;
	}
   </style>
  </head>
<body bgcolor="orange">
  <h1 align="center">Afisare batalii</h1>
<?php
require_once("Bibl.php");
// se stabileşte şirul pentru conexiune universală sau DSN
$dsn=con_bd();
$result=query8($dsn);
// se obţine numărul tuplelor returnate
$num_results = mysqli_num_rows($result);
// se afişează fiecare tuplă returnată
echo ' <Table style = "width:100%">
<tr>
 <th bgcolor="aqua">Nr.crt.</th>
 <th bgcolor="aqua">Batalie</th>
 <th bgcolor="aqua">Rezultat</th>
 <th bgcolor="aqua">Numar nave</th>
</tr>'; 
for ($i=0; $i <$num_results; $i++)
{
$row = mysqli_fetch_assoc($result);

echo '<tr><td align="center" bgcolor="aqua">'.($i+1).'</td>';
echo '<td align="center" bgcolor="aqua">'.htmlspecialchars(stripslashes($row['BATALIE'])).'</td>';
echo '<td align="center" bgcolor="aqua">'.stripslashes($row['REZULTAT']).'</td>';
echo '<td align="center" bgcolor="aqua">'.stripslashes($row['NUMAR_NAVE']).'</td>';

}
echo '</table>';

revenire('autorizati8.php', "50%");
// deconectarea de la BD
mysqli_close($dsn);
?>
</body>
</html>