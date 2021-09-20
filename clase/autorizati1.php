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
echo '<h1><u>06.03.a</u></h1>';
echo '<form action="rezultate1.php" method=post>';
echo '<table border=0>';
echo '<tr><td style="font-size:20px;">Introduceti tipul:</td><td align="center"><input type="text" name="tip" size="2" maxlength="2" style="color:red;font-size:20px;"></td></tr>';
echo '<tr><td colspan="2" align="center"><input type=submit value="Afiseaza"></td></tr>';
echo '</table></form></body>';
echo '<a href="meniu.html" style="color:red;font-size:20px;"><i>Revenire la meniu</i></a>';
}
else
{
echo '<p style="font-size:20px;"><b>Nu ati efectuat log in.</b></p>';
echo '<p style="font-size:20px;"><b>Acces restrictionat.</b></p>';
echo '<a href="sesiune.php" style="color:red;font-size:20px;"><i>Revenire la pagina de log in</i></a>';
}
?>