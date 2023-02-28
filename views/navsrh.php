<?php
if (!isset($section)) {
  header("Location: ../index.php");
}
?>
<link href="css/style.css" rel="stylesheet">
<div style="grid-column: 1 / 3; grid-row: 3; margin: 10px 10px; height: 32px;">
  <form>
    <input type="text" style="padding: 7px; width: calc(100% - 180px); border: 1px solid #e0e0e0;" placeholder="Browse:...">
    <input type="submit" value="Search" style="font-weight: bold; width: 105px; padding: 7px 15px; border: 0px; color: #ffffff; background: #0773fb;">
  </form>
</div>