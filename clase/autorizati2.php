<?php
session_start();
echo '<h1 style="color:blue;">Pagina cu acces limitat</h1>';
// se verifică variabila de sesiune
if (isset($_SESSION['utilizator']))
{
echo '<p style="color:brown;font-size:20px;"><b><i>Sunteti intrat cu numele '.$_SESSION['utilizator'].'</i></b></p>';
echo '<p style="color:brown;font-size:20px;"><b><i>Pentru aceste date detineti drepturi</i></b></p>';

echo '<head><title>Clase</title></head>';
echo '<body style="background-color:yellow;">';
echo '<h1><u>06.03.b</u></h1>';
echo '<form action="rezultate2.php" method=post>';
echo '<table border=0>';
echo '<tr><td style="font-size:20px;">Introduceti anul lansarii:</td><td align="center"><input type="text" name="anul_lansarii" size="4" maxlength="4" style="color:red;font-size:20px;"></td></tr>';
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