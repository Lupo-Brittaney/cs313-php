<?php
function getScriptures(){
    global $db;
    $query = 'SELECT * FROM scripture';
    $statement = $db->prepare($query);
    $statement->execute();
    $scripture = $statement->fetchAll();
    $statement->closeCursor();
    return $scripture;
}

function getScripture($id){
    global $db;
    $query = 'SELECT * FROM scripture WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(":id", $id);
    $statement->execute();
    $scripture = $statement->fetchAll();
    $statement->closeCursor();
    return $scripture;
}

function getBook($book){
    global $db;
    $query = 'SELECT * FROM scripture WHERE book = :book';
    $statement = $db->prepare($query);
    $statement->bindValue(":book", $book);
    $statement->execute();
    $scripture = $statement->fetchAll();
    $statement->closeCursor();
    return $scripture;
}

function getTopics(){
    global $db;
    $query = 'SELECT * FROM topic';
    $statement = $db->prepare($query);
    $statement->execute();
    $topics = $statement->fetchAll();
    $statement->closeCursor();
    return $topics;
}
function insertScripture($book, $chapter, $verse, $content){
     global $db;
    $query = 'INSERT INTO scripture (book, chapter, verse, content)
                VALUES (:book, :chapter, :verse, :content)';
    $statement = $db->prepare($query);
    $statement->bindValue(':book', $book);
    $statement->bindValue(':chapter', $chapter);
    $statement->bindValue(':verse', $verse);
    $statement->bindValue(':content', $content);
    $statement->execute();
    $scrip_id = $db->lastInsertId("scripture_id_seq");
    $statement->closeCursor();
    return $scrip_id;
    
} 

function insertLink($topic_id, $scripture_id){
     global $db;
    $query = 'INSERT INTO link (topic_id, scripture_id)
                VALUES (:topic_id, :scripture_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':scripture_id', $scripture_id);
    $statement->bindValue(':topic_id', $topic_id);
    $statement->execute();
    $insert = $statement->rowCount();
    $statement->closeCursor();
    return $insert;
    
}
function getAll($id){
      global $db;
    $query = 'SELECT name   
                FROM topic t INNER JOIN link l
                ON l.topic_id =t.id 
                WHERE l.scripture_id= :id' ;
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $scripture = $statement->fetchAll();
    $statement->closeCursor();
    return $scripture;

    
}

?>