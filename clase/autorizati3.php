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
echo '<h1><u>06.04.a</u></h1>';
echo '<form action="rezultate3.php" method=post>';
echo '<table border=0>';
echo '<tr><td style="font-size:20px;">Introduceti numele bataliei:</td><td align="center"><input type="text" name="nume" size="30" maxlength="30" style="color:red;font-size:20px;"></td></tr>';
echo '<tr><td colspan="2" align="center"><input type=submit value="Afiseaza"></td></tr>';
echo '</table></form></body>';
}
else
{
echo '<p>Nu ati efectuat log in.</p>';
echo '<p>Acces restrictionat.</p>';
}
echo '<a href="meniu.html" style="color:red;font-size:20px;"><i>Revenire la meniu</i></a>';
?>