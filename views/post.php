<a href="javascript:history.go(-1)" title="Return to previous page" style="color: #212121;">« Go back</a>
<div class="contain">
    <div class="image-container">
        <?php $extension = pathinfo($postData['original'], PATHINFO_EXTENSION);
        $isVid = strtolower($extension) == 'mp4';
        if (in_array($extension, ['mp4', 'avi', 'mov', 'mkv'])) { ?>
            <video style="max-width: 400px;" controls loop>
                <source src="img/posts/original/<?php echo $postData['original']; ?>" type="video/mp4">
            </video>
        <?php } else if (in_array($extension, ['mp3', 'm4a', 'wav', 'flac'])) { ?>
            <audio style="max-width: 400px;" controls>
                <source src="img/posts/original/<?php echo $postData['original']; ?>" type="audio/mp3">
            </audio>
        <?php } else { ?>
            <picture style="max-width: 50%;"> <!-- id_post es en realidad el campo "animated" -->
                <img src="img/posts/original/<?php echo $postData['original']; ?>" class="image" alt="Post Image">
            </picture>
        <?php } ?>
    </div>
    <div class="content-container">
        <strong>Tags:</strong>
        <div>
            <?php foreach ($tags as $tag) {
                if ($tag['id'] != 1) { ?>
                    <a style="color: #212121;"
                        href="posts.php?tag=<?php echo $tag['id']; ?>"><?php echo htmlspecialchars($tag['tag']); ?></a><br>
                <?php }
            } ?>
        </div>
        <?php if (isset($_SESSION['usuario'])) { ?>
            <!-- Botón para mostrar el formulario -->
            <button onclick="toggleForm()" class="show-form-btn">+Tag</button>
            <?php if (($postData['id'] == $_SESSION['usuario']['id'] || $_SESSION['usuario']['rango'] == "administrador")) { ?>
                <form method="post"><button type="submit" name="del" class="show-form-btn"
                        style="background-color: red;">DELETE</button></form>
            <?php } ?>
            <!-- Formulario de edición de tags, inicialmente oculto -->
            <form method="POST" class="form-container" id="tagForm" style="display: none;">
                <label for="tags">Add Tags (separate by spaces):</label>
                <textarea name="tags" placeholder="e.g., nature kemonomimi animated_gif"></textarea>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        <?php } ?>
        <p class="post-info"> <?php echo "Uploaded on " . $date[0] . " by " ?><a style="color: #212121;"
                href="profile.php?profile=<?php echo $postData['id'] ?>"><?php echo $postData['usu_nombre'] ?></a>
        </p><?php if (isset($_SESSION['usuario'])) { ?>
            <p><strong>Visitas:</strong> <span id="visitCount"><?php echo $initialVisitCount; ?></span></p>
            <?php if (isset($_SESSION['usuario'])): ?>
                <div>
                    <button onclick="reactToPost(<?php echo $postData['id_post']; ?>, 'like')" id="like-button">
                        <i class="fa fa-thumbs-o-up"></i><i class="fa fa-thumbs-up"></i> (<span
                            id="like-count"><?php echo $initialLikes; ?></span>)
                    </button>
                    <button onclick="reactToPost(<?php echo $postData['id_post']; ?>, 'dislike')" id="dislike-button">
                        <i class="fa fa-thumbs-o-down"></i><i class="fa fa-thumbs-down"></i> (<span
                            id="dislike-count"><?php echo $initialDislikes; ?></span>)
                    </button>
                </div><?php else: ?>
                <p>Log in to like or dislike this post.</p>
            <?php endif; ?>
            <!-- <p><strong>Porcentaje de Gusto:</strong> <span id="like-percentage"><?php echo number_format($percentage, 2); ?>%</span></p> -->
        <?php } ?>
    </div>
</div>
<script>
    function toggleForm() {
        var form = document.getElementById("tagForm");
        form.style.display = (form.style.display === "none") ? "block" : "none";
    }
    $(document).ready(function () {
        function updateVisitCount() {
            $.ajax({
                url: 'update_visits.php?id=<?php echo $post_id; ?>',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    if (data && data.visitas) {
                        $('#visitCount').text(data.visitas);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error al actualizar el contador de visitas:", error);
                }
            });
        }

        // Llamar a la función para actualizar el contador al cargar la página
        updateVisitCount();
    });

    function reactToPost(postId, reaction) {
        fetch('like_dislike.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `post_id=${postId}&reaction=${reaction}`
        })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    // Actualizar los contadores de likes y dislikes en el frontend
                    document.getElementById('like-count').innerText = data.likes;
                    document.getElementById('dislike-count').innerText = data.dislikes;

                    // Calcular y mostrar el nuevo porcentaje de gusto
                    const totalReactions = data.likes + data.dislikes;
                    const likePercentage = totalReactions > 0 ? (data.likes / totalReactions) * 100 : 0;
                    document.getElementById('like-percentage').textContent = likePercentage.toFixed(2) + '%';
                }
            })
            .catch(error => console.error('Error:', error));
    }


    function updateCounts(newLikes, newDislikes) {
        const totalReactions = newLikes + newDislikes;
        const likePercentage = totalReactions > 0 ? (newLikes / totalReactions) * 100 : 0;
        const dislikePercentage = totalReactions > 0 ? (newDislikes / totalReactions) * 100 : 0;

        document.getElementById("like-count").textContent = newLikes;
        document.getElementById("dislike-count").textContent = newDislikes;
        document.getElementById("like-percentage").textContent = likePercentage.toFixed(2) + '%';
        document.getElementById("dislike-percentage").textContent = dislikePercentage.toFixed(2) + '%';
    }
</script>