<?php
if (!isset($section)) {
  header("Location: ../index.php");
}
?>
<link rel="stylesheet" href="css/home.css">
<nav class="navsrh">
<div>
  <form action="result_search.php" method="GET">
    <input type="text" name="query" style="padding: 7px; width: calc(100% - 180px); border: 1px solid #e0e0e0;" placeholder="Buscar usuarios (@), tags (#) o foro (/)" class="inputTextHome">
    <button type="submit" class="inputSubmitHome">Buscar</button>
</form>
</div>
</nav>
<?php

?>