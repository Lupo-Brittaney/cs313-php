<?php 
require_once('database.php');
require_once('model.php');
$topics = getTopics();

?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <form action="results.php" method="post">
            <label for= "book">Book</label>
            <input type="text" name="book"><br>
            <label for= "Chapter">Chapter</label>
            <input type="text" name="chapter"><br>
            <label for= "verse">Verse</label>
            <input type="text" name="verse"><br>
            <label for= "content">Content</label>
            <textarea name="content"></textarea><br>
            <?php foreach ($topics as $topic){ ?>
            <input type="checkbox" name='topics[]' value="<?php echo $topic['id'] ; ?>" >
            <label for="topics"><?php echo $topic['name'] ; ?></label>
            <?php } ?>
            <input type="submit" value="Submit">
        </form>
        
        
        
    </body>


</html>