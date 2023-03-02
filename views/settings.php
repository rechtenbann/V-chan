<table>
    <tbody>
        <tr>
            <td>
            <?php if (!isset($_SESSION['usuario'])) { ?>
            <a href="log_in.php" class="nav-item">
            <a href="login.php">Login</a>
            </a>
          <?php }else{
            echo "welcome, ". $_COOKIE['username'];
          } ?>
            </td>
        </tr>
        <tr>
            <td>
                <a href="logout.php">Logout</a>
            </td>
        </tr>
        <tr>
            <td>
            </td>
        </tr>
        <tr>
            <td>
                <a href="signup.php">Signup</a>
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