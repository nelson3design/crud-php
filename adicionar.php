<?php
 include 'config.php';



?>


<h2>adicionar usuario</h2>
<form action="adiciona-action.php" method="POST">

<input type="text" placeholder="nome" name="nome">
<br><br>
<input type="email" placeholder="email" name="email">
<br><br>
<input type="tel" name="tel" pattern="[0-9]{11}" placeholder="###########">
<br><br>
<input type="date"  name="idade">
<br><br>

<button type="submit">adicionar</button>

</form>