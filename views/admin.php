<table style="border: 1px solid  black;margin-left: auto;
  margin-right: auto;<?php if ((isset($_COOKIE['dark_mode'])&&$_COOKIE['dark_mode']=='false')) {echo "";} else { echo "color:white";}?>">
    <tr>
        <th style="border: 1px solid black;">
            ID
        </th>
        <th style="border: 1px solid black;">
            Usuario
        </th>
        <th style="border: 1px solid black;">
            Rango <!--border: 3px outset  black;-->
        </th>
        <th style="border: 1px solid  black;">
            Correo
        </th>
        <th style="border: 1px solid black;">
            Fecha de creación
        </th>
        <th style="border: 1px solid black;">
            Opciones
        </th>
    </tr>
    <?php foreach ($usuarios as $usuario) { ?>
        <tr>
            <th style="border: 1px solid black;">
                <?php echo $usuario['id']; ?>
            </th>
            <th style="border: 1px solid black;">
                <a href="profile.php?usr=<?php echo $usuario['id']; if($usuario['fecha_baja']!=null){ echo "&state=banned";}?>" style="<?php if($usuario['fecha_baja']!=null){ echo "color:grey";}?>"><?php echo $usuario['usu_nombre']; ?></a>
            </th>

            <th style="border: 1px solid black;">
                <?php
                if (isset($usuario['id'])) {
                    $sql = "SELECT r.rango FROM rango_usuario AS ru
                INNER JOIN rangos AS r
                ON ru.rango_id = r.id
                WHERE ru.usu_id = " . $usuario['id'] . " AND
                fecha_baja IS NULL";
                    $rec = mysqli_query($link, $sql);
                    $rango = mysqli_fetch_assoc($rec);
                }
                echo $rango['rango'];
                ?>
            </th>

            <th style="border: 1px solid black;">
                <?php echo $usuario['usu_email']; ?>
            </th>
            <th style="border: 1px solid black;">
                <?php echo $usuario['fecha_alta']; ?>
            </th>
            <th style="border: 1px solid black;width:30%;">
            <?php if($usuario['id']!=$_SESSION['usuario']['id']){?>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="Upgrade">
                    <input type="hidden" value="<?php echo $usuario['id']?>" name="id">
                    <input type="submit" value="Give premium" style="background-color: green; border: none; color: white; width:45%">
                    <input type="hidden" value="<?php echo $rango['rango']?>" name="rnk">
                </form>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="Downgrade">
                    <input type="hidden" value="<?php echo $usuario['id']?>" name="id">
                    <input type="hidden" value="<?php echo $rango['rango']?>" name="rnk">
                    <input type="submit" value="Remove premium"
                        style="background-color: darkred; border: none; color: white; width:45%">
                </form>
                <br>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="Admin">
                    <input type="hidden" value="<?php echo $usuario['id']?>" name="id">
                    <input type="hidden" value="<?php echo $rango['rango']?>" name="rnk">
                    <input type="submit" value="Give admin"
                        style="background-color: green; border: none; color: white; width:45%">
                </form>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="NoAdmin">
                    <input type="hidden" value="<?php echo $usuario['id']?>" name="id">
                    <input type="hidden" value="<?php echo $rango['rango']?>" name="rnk">
                    <input type="submit" value="Remove admin"
                        style="background-color: darkred; border: none; color: white; width:45%">
                </form>
                <br>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="Unban">
                    <input type="hidden" value="<?php echo $usuario['id']?>" name="id">
                    <input type="submit" value="Unban X" style="background-color: green; border: none; color: white; width:45%">
                </form>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="Ban">
                    <input type="hidden" value="<?php echo $usuario['id']?>" name="id">
                    <input type="submit" value="Ban X" style="background-color: darkred; border: none; color: white; width:45%">
                </form>
                <?php } else if($usuario['id']==$_SESSION['usuario']['id']){?>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="#">
                    <input type="hidden" value="<?php echo $usuario['id']?>" name="id">
                    <input type="submit" value="Give premium" style="background-color: grey; border: none; color: white; width:45%">
                    <input type="hidden" value="<?php echo $rango['rango']?>" name="rnk">
                </form>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="#">
                    <input type="hidden" value="<?php echo $usuario['id']?>" name="id">
                    <input type="hidden" value="<?php echo $rango['rango']?>" name="rnk">
                    <input type="submit" value="Remove premium"
                        style="background-color: dimgrey; border: none; color: white; width:45%">
                </form>
                <br>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="#">
                    <input type="hidden" value="<?php echo $usuario['id']?>" name="id">
                    <input type="hidden" value="<?php echo $rango['rango']?>" name="rnk">
                    <input type="submit" value="Give admin"
                        style="background-color: grey; border: none; color: white; width:45%">
                </form>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="#">
                    <input type="hidden" value="<?php echo $usuario['id']?>" name="id">
                    <input type="hidden" value="<?php echo $rango['rango']?>" name="rnk">
                    <input type="submit" value="Remove admin"
                        style="background-color: dimgrey; border: none; color: white; width:45%">
                </form>
                <br>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="#">
                    <input type="hidden" value="<?php echo $usuario['id']?>" name="id">
                    <input type="submit" value="Unban X" style="background-color: grey; border: none; color: white; width:45%;">
                </form>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="#">
                    <input type="hidden" value="<?php echo $usuario['id']?>" name="id">
                    <input type="submit" value="Ban X" style="background-color: dimgrey; border: none; color: white; width:45%">
                </form>
                <?php } ?>
            </th>
        </tr>
    <?php } ?>
</table>
<?php for($i=0;$i<8;$i++){echo "<br>";}?>