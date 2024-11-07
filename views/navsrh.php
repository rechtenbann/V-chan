<?php
if (!isset($section)) {
  header("Location: ../index.php");
}
?>
<link rel="stylesheet" href="css/home.css">
<nav class="navsrh">
<div>
  <form action="result_search.php" method="GET">
    <input type="text" name="query" style="width: calc(100% - 200px);" placeholder="Buscar usuarios (@), tags (#) o foro (/)" class="inputTextHome">
    <button type="submit" class="inputSubmitHome">Buscar</button>
</form>
</div>
</nav>
<?php

?>