<html>
 <head>
   <title>Afisare clase cu cel mai mic numar de arme</title>
   <style>
    table, th, td
	{
		border: 1px solid black;
	}
   </style>
  </head>
<body bgcolor="orange">
  <h1 align="center">Afisare clase cu cel mai mic numar de arme</h1>
<?php
require_once("Bibl.php");
// se stabileşte şirul pentru conexiune universală sau DSN
$dsn=con_bd(); 
$result=query5($dsn);
// se obţine numărul tuplelor returnate
$num_results = mysqli_num_rows($result);
// se afişează fiecare tuplă returnată
echo ' <Table style = "width:100%">
<tr>
 <th bgcolor="aqua">Nr.crt.</th>
 <th bgcolor="aqua">Clasa</th>
 <th bgcolor="aqua">Tip</th>
 <th bgcolor="aqua">Tara</th>
 <th bgcolor="aqua">Numar arme</th>
 <th bgcolor="aqua">Diametru tun</th>
 <th bgcolor="aqua">Deplasament</th>
</tr>'; 
for ($i=0; $i <$num_results; $i++)
{
$row = mysqli_fetch_assoc($result);

echo '<tr><td align="center" bgcolor="aqua">'.($i+1).'</td>';
echo '<td align="center" bgcolor="aqua">'.htmlspecialchars(stripslashes($row['clasa'])).'</td>';
echo '<td align="center" bgcolor="aqua">'.stripslashes($row['tip']).'</td>';
echo '<td align="center" bgcolor="aqua">'.stripslashes($row['tara']).'</td>';
echo '<td align="center" bgcolor="aqua">'.stripslashes($row['nr_arme']).'</td>';
echo '<td align="center" bgcolor="aqua">'.stripslashes($row['diametru_tun']).'</td>';
echo '<td align="center" bgcolor="aqua">'.stripslashes($row['deplasament']).'</td>';

}
echo '</table>';
revenire('autorizati5.php', "50%");
// deconectarea de la BD
mysqli_close($dsn);
?>
</body>
</html>