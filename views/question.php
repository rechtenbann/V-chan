<div>
    <div style="background-color: white; text-align:center; width:75%; padding:2rem; margin:auto;">
        <div>
            <h3><?php echo $question['title']; ?></h3>

            <?php foreach ($images as $image) { ?>
                <img src="<?php echo $image['img']; ?>" style="max-width:20rem;">

            <?php } ?>

            <p style="word-wrap: break-word; text-align:left"><?php echo $question['description']; ?></p>
        </div>
    </div>
    <div style="width: 50%;margin:auto; text-align:left; background-color:white; min-height:3rem; margin-bottom:1rem;margin-top:1rem; padding:5px">
        
        <?php foreach ($ans as $a) { 
            $sql="SELECT * FROM usuarios WHERE id='".$a['uid']."'";
            $query=mysqli_query($link,$sql);
            $ansuser=mysqli_fetch_assoc($query);
            ?>
            <div style="border:2px solid black; margin:1rem; padding:5px;">
            <a style="word-wrap: break-word;" href="<?php if($ansuser['id']!=$_SESSION['usuario']['id']){echo "profile.php?usr=".$ansuser['id'];}else{echo "profile.php";}?>"><?php echo $ansuser['usu_nombre'];?></a><a><?php if($ansuser['id']!=$_SESSION['usuario']['id']){if($ansuser['id']==$quser['id']){ echo " | OP";}else{echo " | USER";}}else{echo " | YOU";} ?></a>
            <p style="word-wrap: break-word;"><?php echo $a['answer']; ?></p>
            </div>
        <?php } ?>
    </div>
    <div>
        <form method="POST">
            <textarea name="answer" placeholder="Answer"></textarea>
            <button type="submit" name="send">Send</button>
        </form>
    </div>
</div>