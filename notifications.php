<link rel="stylesheet" href="css/notifications.css">

<h3>Solicitudes de Chat</h3>
<div class="notificacion" style="margin-left:3%;">
    <?php
    require_once "includes/config.php";
    $sql = "SELECT * FROM chat_requests WHERE status='pending' AND receiver_id=" . $_SESSION['usuario']['id'];
    $query = mysqli_query($link, $sql);
    if (!$query) {
        echo "Error en la consulta: " . mysqli_error($link);
        exit;
    }
    $solicitudes = mysqli_fetch_all($query, MYSQLI_ASSOC);
    if (empty($solicitudes)) {
        echo "<p>No tienes solicitudes de chat pendientes.</p>";
    } else {
        foreach ($solicitudes as $solicitud) { ?>
            <div class='solicitud' data-id='<?php echo $solicitud['sender_id']; ?>'>
                <p>Usuario de ID: <?php echo $solicitud['sender_id']; ?> quiere chatear contigo.</p>
                <form action="manage_chat_request.php" method="POST" style="display:inline;">
                    <input type="hidden" name="action" value="accept">
                    <input type="hidden" name="sender_id" value="<?php echo $solicitud['sender_id']; ?>">
                    <button type="submit" class="buttonNotification">Aceptar</button>
                </form>
                <form action="manage_chat_request.php" method="POST" style="display:inline;">
                    <input type="hidden" name="action" value="reject">
                    <input type="hidden" name="sender_id" value="<?php echo $solicitud['sender_id']; ?>">
                    <button type="submit" class="buttonNotification">Rechazar</button>
                </form>
            </div>
        <?php }
    }
    ?>
</div>