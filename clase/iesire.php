<?php
session_start();
// se verifică dacă utilizatorul curent a efectuat "log in"
$ut_prec = $_SESSION['utilizator'];
unset($_SESSION['utilizator']);
session_destroy();
?>
<html>
<body bgcolor="yellow">
<h1>Iesire</h1>
<?php
if (!empty($ut_prec))
{
echo '<p style="font-size:20px;"><b>La revedere...<br /></b></p>';
}
else
{
// dacă s-a ajuns din greşeală la această pagină (fără a fi intrat în sistem)
echo 'Nu ati efectuat log in, nu aveti cum efectua log out.<br />';
}
?>
<a href="sesiune.php" style="color:red;font-size:20px;"><i>Revenire la pagina principala</i></a>
</body>
</html>