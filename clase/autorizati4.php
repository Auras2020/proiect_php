<?php
session_start();
echo '<h1 style="color:blue;">Pagina cu acces limitat</h1>';
// se verifică variabila de sesiune
if (isset($_SESSION['utilizator']))
{
echo '<p style="color:brown;font-size:20px;"><b><i>Sunteti intrat cu numele '.$_SESSION['utilizator'].'</b></i></p>';
echo '<p style="color:brown;font-size:20px;"><b><i>Pentru aceste date detineti drepturi</b></i></p>';

echo '<head><title>Clase</title></head>';
echo '<body style="background-color:yellow;">';
echo '<h1><u>06.04.b</u></h1>';
echo '<form action="rezultate4.php" method=post>';
echo '<tr><td colspan="2" align="center"><input type=submit value="Afiseaza"></td></tr>';
echo '</form></body>';
}
else
{
echo '<p>Nu ati efectuat log in.</p>';
echo '<p>Acces restrictionat.</p>';
}
echo '<a href="meniu.html" style="color:red;font-size:20px;"><i>Revenire la meniu</i></a>';
?>