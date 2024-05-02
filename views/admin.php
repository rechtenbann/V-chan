<table style="border: 5px outset  black;">
    <tr>
        <th style="border: 3px outset black;">
            ID
        </th>
        <th style="border: 3px outset black;">
            Usuario
        </th>
        <th style="border: 3px outset black;">
            Rango
        </th>
        <th style="border: 3px outset  black;">
            Correo
        </th>
        <th style="border: 3px outset black;">
            Fecha de creación
        </th>
        <th style="border: 3px outset black;">
            Opciones
        </th>
    </tr>
    <?php foreach ($usuarios as $usuario) { ?>
        <tr>
            <th style="border: 1px solid black;">
                <?php echo $usuario['id']; ?>
            </th>
            <th style="border: 1px solid black;">
                <?php echo $usuario['usu_nombre']; ?>
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
            <th style="border: 3px outset black;">
                <form method="post" style="display: inline;">
                    <input type="hidden" name="Upgrade">
                    <input type="submit" value="Dar premium ♛" style="background-color: gold; border: none; color: white;">
                </form>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="Downgrade">
                    <input type="submit" value="Quitar premium"
                        style="background-color: brown; border: none; color: white;">
                </form>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="Admin">
                    <input type="submit" value="Dar permisos de administrador"
                        style="background-color: darkolivegreen; border: none; color: white;">
                </form>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="NoAdmin">
                    <input type="submit" value="Remover permisos de administrador"
                        style="background-color: tomato; border: none; color: white;">
                </form>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="Ban">
                    <input type="submit" value="Ban X" style="background-color: darkred; border: none; color: white;">
                </form>
            </th>
        </tr>
    <?php } ?>
</table>