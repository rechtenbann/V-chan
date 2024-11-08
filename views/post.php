<script>
    $(function () {

        // optional: don't cache ajax to force the content to be fresh
        $.ajaxSetup({
            cache: false
        });

        // specify the server/url you want to load data from
        var likes = "<?php echo $ll['v'] ?>";

        // on click, load the data dynamically into the #demo div
        // while loading, show three dots (…)
        $("#like").click(function () {
            $("#likes").load(likes);
        });
    });
</script>
<div class="contain">
    <div class="image-container">
        <picture>
            <img src="img/posts/<?php echo $postData['image']; ?>" class="image" alt="Post Image" width="365px" height="365px">
        </picture>
    </div>

    <div class="content-container">
        <strong>Tags:</strong>
        <div>
            <?php foreach ($tags as $tag) {
                if ($tag['id'] != 1) { ?>
                    <a href="posts.php?tag=<?php echo $tag['id']; ?>"><?php echo htmlspecialchars($tag['tag']); ?></a>
                <?php }
            } ?>
        </div>


        <!-- Botón para mostrar el formulario -->
        <button onclick="toggleForm()" class="show-form-btn">+Tag</button>
        <?php if($postData['id']==$_SESSION['usuario']['id']||$_SESSION['usuario']['rango']=="administrador"){ ?>
        <form method="post"><button type="submit" name="del" class="show-form-btn" style="background-color: red;">DELETE</button></form>
        <?php } ?>
        <!-- Formulario de edición de tags, inicialmente oculto -->
        <form method="POST" class="form-container" id="tagForm" style="display: none;">
            <label for="tags">Add Tags (separate by commas):</label>
            <textarea name="tags" placeholder="e.g., nature, travel, animals"></textarea>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
        <!-- <p class="post-info"><?php echo "Uploaded on " . $date[0] . " by " . htmlspecialchars($postData['usu_nombre']); ?></p> -->
        <p class="post-info"><?php echo "Uploaded on " . $date[0] . " by " ?><a href="profile.php?profile=<?php echo $postData['id']?>"><?php echo $postData['usu_nombre']?></a></p>
        <form method="post">
            <button type="submit" name="like" id="like" data-toggle="tooltip" data-placement="top"
                title="like">LIKE</button>
            <span id="likes"><?php echo $ll['v'] ?></span>
    </div>
</div>
<script>
    function toggleForm() {
        var form = document.getElementById("tagForm");
        form.style.display = (form.style.display === "none") ? "block" : "none";
    }
</script>

<style>
    .contain {
        display: flex;
        gap: 20px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 10px;
    }

    .image-container img {
        max-width: 100%;
        border-radius: 8px;
    }

    .content-container {
        max-width: 400px;
        font-family: Arial, sans-serif;
    }

    .tags {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 10px;
        margin-bottom: 15px;
    }

    .tag {
        background-color: #e1e1e1;
        color: #555;
        padding: 5px 12px;
        border-radius: 12px;
        text-decoration: none;
        font-size: 0.9rem;
        transition: background-color 0.3s;
    }

    .tag:hover {
        background-color: #d1d1d1;
    }

    .post-info {
        font-size: 0.9rem;
        color: #777;
        margin: 10px 0;
    }

    .show-form-btn {
        background-color: #008cba;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        font-size: 0.9rem;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-top: 10px;
    }

    .show-form-btn:hover {
        background-color: #007bb5;
    }

    .form-container {
        margin-top: 15px;
        background-color: #fff;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    textarea {
        width: 100%;
        height: 60px;
        margin-top: 8px;
        padding: 8px;
        font-size: 0.9rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        resize: none;
    }
</style>