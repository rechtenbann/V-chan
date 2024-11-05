<table>
    <tbody>


        <?php if (!isset($_SESSION['usuario'])) { ?>
            <tr>
                <td>
                    <a href="login.php" style="color:#212121;">Login</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="signup.php"  style="color:#212121;">Signup</a>
                </td>
            </tr>
            </a>
        <?php } else if (isset($_SESSION['usuario'])) {
        ?><a href="logout.php"  style="color:#212121;">Logout</a>
        <?php } ?>
        <tr>
            <td>
            </td>
        </tr>
        <tr>
            <td>
                <label>
                    <a href="options.php"  style="color:#212121;">Options</a>
                </label>
            </td>
        </tr>
    </tbody>
</table>
<a href="profile_other.php"  style="color:#212121;">lol</a>
<button id="btn1"  style="color:#212121;">Boton 1</button>
<button id="btn2"  style="color:#212121;">booton 2</button>
<div id="contenido1" class="contenido1">
    <p>XDDDDDDDDDDDD</p>
</div>
<div id="contenido2" class="contenido2">
    <p>LoLLLLLLLLLLL</p>
</div>
<style>
    .contenido1 {display: block;}
    .contenido2 {display: none;}
</style>
<script>
document.getElementById("btn1").addEventListener('click', function(){
    document.getElementById("contenido1").style.display="none";
    document.getElementById("contenido2").style.display="block";
});
document.getElementById("btn2").addEventListener('click', function(){
    document.getElementById("contenido2").style.display="none";
    document.getElementById("contenido1").style.display="block";
});
</script>