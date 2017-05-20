<?php



function get_person($email){
    global $db;
    $query= 'SELECT * FROM person
            WHERE email= :email';
    $statement=$db->prepare($query);
    $statement->bindValue (':email', $email);
    $statement->execute();
    $personReturn=$statement->fetch();
    $statement->closeCursor();
    return $personReturn;
}

function get_orgs($person){
    global $db;
    $query='SELECT org.name, org.fee FROM org
            INNER JOIN member
            ON org.id = member.org_id
            WHERE member.person_id = :person';
    $statement=$db->prepare($query);
    $statement->bindValue (':person', $person);
    $statement->execute();
    $orgs=$statement->fetchAll();
    $statement->closeCursor();
    return $orgs;
}

?>
