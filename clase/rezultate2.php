<html>
 <head>
   <title>Afisare nave dupa an</title>
   <style>
    table, th, td
	{
		border: 1px solid black;
	}
   </style>
  </head>
<body bgcolor="orange">
  <h1 align="center">Afisare nave dupa an</h1>
<?php
require_once("Bibl.php");
// creare variabile cu nume scurte
$anul_lansarii=$_POST['anul_lansarii'];
$anul_lansarii= trim($anul_lansarii);
if (!$anul_lansarii)
{
echo '<p style="font-size:20px;"><b>Nu ati introdus criteriul de cautare. Va rog sa incercati din nou.</b></p>';
revenire('autorizati2.php', "15%");
}
if (!get_magic_quotes_gpc())
{
$anul_lansarii = addslashes($anul_lansarii);
}
// se stabileşte şirul pentru conexiune universală sau DSN
$dsn=con_bd();
$result=query2($dsn, $anul_lansarii);
// se obţine numărul tuplelor returnate
$num_results = mysqli_num_rows($result);
// se afişează fiecare tuplă returnată
echo ' <Table style = "width:100%">
<tr>
 <th bgcolor="aqua">Nr.crt.</th>
 <th bgcolor="aqua">Nava</th>
 <th bgcolor="aqua">Anul lansarii</th>
</tr>'; 
for ($i=0; $i <$num_results; $i++)
{
$row = mysqli_fetch_assoc($result);

echo '<tr><td align="center" bgcolor="aqua">'.($i+1).'</td>';
echo '<td align="center" bgcolor="aqua">'.htmlspecialchars(stripslashes($row['nume'])).'</td>';
echo '<td align="center" bgcolor="aqua">'.stripslashes($row['anul_lansarii']).'</td>';

}
echo '</table>';

revenire('autorizati2.php', "50%");
// deconectarea de la BD
mysqli_close($dsn);
?>
</body>
</html>