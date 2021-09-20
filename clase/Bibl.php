<?php

function con_bd()
{
$host = file_get_contents("C:\Users\Auras\AppData\sbdp.txt");
// fişierul "C:\Users\Auras\AppData\sbdp.txt" conţine localhost
$user = file_get_contents("C:\Users\Auras\AppData\uidp.txt");
// fişierul "C:\Users\Auras\AppData\uidp.txt" conţine utweb
$pass = file_get_contents("C:\Users\Auras\AppData\pwdp.txt");
// fişierul "C:\Users\Auras\AppData\pwdp.txt" conţine parweb
$db_name=file_get_contents("C:\Users\Auras\AppData\bdp.txt");
// fişierul "C:\Users\Auras\AppData\bdp.txt" conţine numele bazei de date

$db_conn = new mysqli($host, $user, $pass, $db_name);
if ($db_conn->connect_error)
{
	die('Eroare la conectare:'. $db_conn->connect_error);
}

return $db_conn;
}

function afis_mesaj($msg)
{
	echo "<p style='font-size:20px;'><b>nu ati introdus $msg.</b></p>";
	echo '<style>
.container {
  height: 10px;
  position: relative;
}

.center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 7%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
</style>

<div class="container">
  <form action="sesiune.php" method=post><body>
  <div class="center">
    <button>Revenire</button>
  </div>
  </form>
</div>';
exit;
}		

function revenire($autorizati, $left)
{	
echo "<style>
.container {
  height: 40px;
  position: relative;
}

.center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: $left;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
</style>

<div class='container'>
  <form action=$autorizati method=post><body>
  <div class='center'>
    <button>Revenire la pagina autorizata</button>
  </div>
  </form>
</div>";
exit;
}

function query1($dsn, $tip)
{
// se emite interogarea
$query = "SELECT *
FROM CLASE
WHERE TIP='$tip' AND DEPLASAMENT BETWEEN 4000 AND 6000";
$result = mysqli_query($dsn, $query);
if (!$result)
{
	die('Interogare gresita :'.mysqli_error($dsn));
}
return $result;
}	

function query2($dsn, $anul_lansarii)
{
// se emite interogarea
$query = "SELECT *
FROM NAVE
WHERE ANUL_LANSARII>'$anul_lansarii'
ORDER BY ANUL_LANSARII DESC";
$result = mysqli_query($dsn, $query);
// verifică dacă rezultatul este în regulă
if (!$result)
{
	die('Interogare gresita :'.mysqli_error($dsn));
}
return $result;
}	

function query3($dsn, $nume)
{
// se emite interogarea
$query = "SELECT *
FROM CLASE CLAS JOIN NAVE NAV ON(CLAS.CLASA=NAV.CLASA) JOIN CONSECINTE CONS ON(NAV.NUME=CONS.NAVA)
WHERE CONS.BATALIE='$nume'";
$result = mysqli_query($dsn, $query);
// verifică dacă rezultatul este în regulă
if (!$result)
{
	die('Interogare gresita :'.mysqli_error($dsn));
}
return $result;
}

function query4($dsn)
{
// se emite interogarea
$query = "SELECT C1.CLASA AS CLASA1, C1.TIP AS TIP1, C2.CLASA AS CLASA2, C2.TIP AS TIP2, NVL(C1.TARA, 0) AS TARA
FROM CLASE C1 JOIN CLASE C2
ON(C1.TARA=C2.TARA OR (C1.TARA IS NULL AND C2.TARA IS NULL))
WHERE C1.CLASA<C2.CLASA AND C1.TIP!=C2.TIP";
$result = mysqli_query($dsn, $query);
// verifică dacă rezultatul este în regulă
if (!$result)
{
	die('Interogare gresita :'.mysqli_error($dsn));
}
return $result;
}

function query5($dsn)
{
// se emite interogarea
$query = "SELECT *
FROM CLASE
WHERE NR_ARME<=ALL
    (SELECT NR_ARME
     FROM CLASE
     WHERE NR_ARME IS NOT NULL)";
$result = mysqli_query($dsn, $query);
// verifică dacă rezultatul este în regulă
if (!$result)
{
	die('Interogare gresita :'.mysqli_error($dsn));
}
return $result;
}	

function query6($dsn, $clasa)
{
// se emite interogarea
$query = "SELECT *
FROM BATALII BAT JOIN CONSECINTE CONS ON(BAT.NUME=CONS.BATALIE) JOIN NAVE NAV ON(CONS.NAVA=NAV.NUME)
WHERE NAV.NUME IN
   (SELECT NAV.NUME
    FROM NAVE NAV
    WHERE NAV.CLASA='$clasa')";
$result = mysqli_query($dsn, $query);
// verifică dacă rezultatul este în regulă
if (!$result)
{
	die('Interogare gresita :'.mysqli_error($dsn));
}
return $result;
}

function query7($dsn, $tip)
{
// se emite interogarea
$query = "SELECT *
FROM CLASE
WHERE CLASA=
   (SELECT CLASA
    FROM CLASE
    WHERE DIAMETRU_TUN=
      (SELECT MAX(DIAMETRU_TUN)
       FROM CLASE
       WHERE TIP='$tip'))";
$result = mysqli_query($dsn, $query);
// verifică dacă rezultatul este în regulă
if (!$result)
{
	die('Interogare gresita :'.mysqli_error($dsn));
}
return $result;
}

function query8($dsn)
{
// se emite interogarea
$query = "SELECT BATALIE AS BATALIE, REZULTAT AS REZULTAT, COUNT(NAVA) AS NUMAR_NAVE
FROM CONSECINTE
GROUP BY BATALIE, REZULTAT";
$result = mysqli_query($dsn, $query);
// verifică dacă rezultatul este în regulă
if (!$result)
{
	die('Interogare gresita :'.mysqli_error($dsn));
}
return $result;
}

function acces($db_conn, $nume, $parola)
{
$tb = file_get_contents("C:\Users\Auras\AppData\pbp.txt");
// fişierul "C:\Users\Auras\AppData\pbp.txt" conţine utilizatorii

if($nume=='nume1')
{
   $query = "select * from $tb where nume = '$nume' and parola = '$parola'";	
}
else
{
	$query = "select * from $tb where nume = '$nume' and parola = sha1('$parola')";
}
$result = $db_conn->query($query);
return $result;
}

?>