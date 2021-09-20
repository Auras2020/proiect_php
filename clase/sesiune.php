<?php
require_once('Bibl.php');
session_start();
if (isset($_POST['nume']) && isset($_POST['parola']))
{

$nume = $_POST['nume'];
$parola = $_POST['parola'];

if(!$nume)
{
	afis_mesaj("numele");
}
if(!$parola)
{
	afis_mesaj("parola");
}

$db_conn=con_bd();
$result=acces($db_conn, $nume, $parola);
if ($result->num_rows >0 )
{
// dacă utilizatorul există în BD atunci se înregistrează identificator de sesiune
$_SESSION['utilizator'] = $nume;
}
$db_conn->close();
}
?>
<html>
<body bgcolor="yellow">
<h1>Pagina principala</h1>
<?php
if (isset($_SESSION['utilizator']))
{
echo '<p style="font-size:20px;"><b>Ati accesat cu numele: '.$_SESSION['utilizator'].' <br /></b>';
echo '<a href="iesire.php" style="color:red;font-size:20px;"><i>Iesire</i></a><br /></p>';

}
else
{
if (isset($nume))
{
// utilizatorul a încercat "log in" şi nu a reuşit
echo 'Nu se poate efectua log in.<br />';
}
else
{
// utilizatorul nu a încercat să efectueze "log in" sau a efectuat "log out"
echo 'Nu ati efectuat log in.<br />';
}

// provide form to log in
echo '<form method="post" action="sesiune.php">';
echo '<table>';
echo '<tr><td>Numele:</td>';
echo '<td><input type="text" name="nume"></td></tr>';
echo '<tr><td>Parola:</td>';
echo '<td><input type="password" name="parola"></td></tr>';
echo '<tr><td colspan="2" align="center">';
echo '<input type="submit" value="Intrare"></td></tr>';
echo '</table></form>';
}
if (!isset($_SESSION['utilizator']))
{
	echo '<a href="sesiune.php" style="color:red;font-size:20px;"><i>Pagina celor autorizati</i></a>';
}
else
{
	echo '<a href="meniu.html" style="color:red;font-size:20px;"><i>Pagina celor autorizati</i></a>';
}
?>
<br/>
</body>
</html>