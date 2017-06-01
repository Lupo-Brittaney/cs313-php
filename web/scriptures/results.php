<?php 
require_once('database.php');
require_once('model.php');
error_reporting(E_ALL);
ini_set("display_errors", 1);
$book= filter_input(INPUT_POST, 'book', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$chapter = filter_input(INPUT_POST, 'chapter', FILTER_SANITIZE_NUMBER_INT);
$verse = filter_input(INPUT_POST, 'verse', FILTER_SANITIZE_NUMBER_INT);
$content= filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//$topic= filter_input(INPUT_POST, 'topics');

$scrip_id=insertScripture($book, $chapter, $verse, $content);
foreach ($_POST['topics'] as $topicId){
    $insert_topics=insertLink($topicId, $scrip_id);
    
}

$scriptures=getScriptures();




?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
          <?php      
            foreach($scriptures as $scripture){
        	echo "<p><strong>" . $scripture['book'] . " " . $scripture['chapter'] . ":" . $scripture['verse'] . "</strong>" . $scripture['content'] . "<br> Topics: ";
                $topics=getAll($scripture['id']);
                foreach($topics as $topic_script){
                    echo $topic_script['name'] . ' ';
             }
                
                 echo '</p>';
            }
      
        ?>
    </body>


</html>