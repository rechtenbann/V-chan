<table>
    <tbody>


        <?php if (!isset($_SESSION['usuario'])) { ?>
            <tr>
                <td>
                    <a href="login.php">Login</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="signup.php">Signup</a>
                    
                </td>
            </tr>
            </a>
        <?php } else if (isset($_SESSION['usuario'])) {
            ?><a href="logout.php">Logout</a>
        <?php } ?>
        <tr>
            <td>
            </td>
        </tr>

        <tr>
            <td>
                <label>
                    <a href="options.php">Options</a>
                </label>
            </td>
        </tr>
    </tbody>
</table>
<?php for($i=0;$i<10;$i++){echo "<br>";}?>