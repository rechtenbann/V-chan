<div class="image">
<img src="img/posts/<?php echo $post[1]?>" height="500"><br>
<a>Tags:</a>
<table>
    <tr>
       <?php
       if (isset($result["tags"])) {
        foreach ($result['tags'] as $tag) {?>
        <td>
<a href="posts.php?tag=<?php echo $tag[0] ?>"><?php echo $tag[0]; ?></a>
        </td>
        <?php }
        } ?>
    </tr>
</table>


    

<?php echo "uploaded on $date[0] by $post[0]" ?>
</div>