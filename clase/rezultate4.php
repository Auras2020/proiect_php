<html>
 <head>
   <title>Afisare perechi de clase</title>
   <style>
    table, th, td
	{
		border: 1px solid black;
	}
   </style>
  </head>
<body bgcolor="orange">
  <h1 align="center">Afisare perechi de clase</h1>
<?php
require_once("Bibl.php");
// se stabileşte şirul pentru conexiune universală sau DSN
$dsn=con_bd();
$result=query4($dsn);
// se obţine numărul tuplelor returnate
$num_results = mysqli_num_rows($result);
// se afişează fiecare tuplă returnată
echo ' <Table style = "width:100%">
<tr>
 <th bgcolor="aqua">Nr.crt.</th>
 <th bgcolor="aqua">Clasa1</th>
 <th bgcolor="aqua">Tip1</th>
 <th bgcolor="aqua">Clasa2</th>
 <th bgcolor="aqua">Tip2</th>
 <th bgcolor="aqua">Tara</th>
</tr>'; 
for ($i=0; $i <$num_results; $i++)
{
$row = mysqli_fetch_assoc($result);

echo '<tr><td align="center" bgcolor="aqua">'.($i+1).'</td>';
echo '<td align="center" bgcolor="aqua">'.htmlspecialchars(stripslashes($row['CLASA1'])).'</td>';
echo '<td align="center" bgcolor="aqua">'.stripslashes($row['TIP1']).'</td>';
echo '<td align="center" bgcolor="aqua">'.stripslashes($row['CLASA2']).'</td>';
echo '<td align="center" bgcolor="aqua">'.stripslashes($row['TIP2']).'</td>';
echo '<td align="center" bgcolor="aqua">'.stripslashes($row['TARA']).'</td>';

}
echo '</table>';
revenire('autorizati4.php', "50%");
// deconectarea de la BD
mysqli_close($dsn);
?>
</body>
</html>