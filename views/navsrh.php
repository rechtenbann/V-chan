<?php
if (!isset($section)) {
  header("Location: ../index.php");
}
?>
<nav class="navsrh">
<div>
  <form>
    <input type="search" style="padding: 7px; width: calc(100% - 180px); border: 1px solid #e0e0e0;" placeholder="Browse:...">
    <input type="submit" value="Search" style="font-weight: bold; width: 105px; padding: 7px 15px; border: 0px; color: #ffffff; background: #0773fb;">
  </form>
</div>
</nav>