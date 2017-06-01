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
function get_ownerOrg($person){
    global $db;
    $query='SELECT * FROM org
            WHERE ownerId = :person';
    $statement=$db->prepare($query);
    $statement->bindValue (':person', $person);
    $statement->execute();
    $orgs=$statement->fetchAll();
    $statement->closeCursor();
    return $orgs;    
}

function delete_org($orgId){
    global $db;
    $query= "DELETE FROM org WHERE id='$orgId'";
    $statement= $db->exec($query);
  

    
}
function add_org($name, $fee, $ownerId){
    global $db;
    $query= 'INSERT INTO org 
                (name, fee, ownerId)
            VALUES
                (:name, :fee, :ownerId)';
            
    $statement=$db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':fee', $fee);
    $statement->bindValue(':ownerId', $ownerId);
    $statement->execute();
    $statement->closeCursor();
    
}
function get_members($orgId){
    global $db;
    $query = 'SELECT p.firstname, p.lastname, p.email, m.payAmount, m.person_id
             FROM person p
             INNER JOIN member m 
             ON p.id = m.person_id
             WHERE m.org_id = :orgId';
    $statement= $db-> prepare($query);
    $statement->bindValue(':orgId', $orgId);
    $statement->execute();
    $members=$statement->fetchAll();
    $statement->closeCursor();
    return $members;
    
}
function update_pay($memberId, $payAmount, $payType){
    global $db;
    $query= "UPDATE member SET payAmount='$payAmount', payType='$payType' WHERE id='$memberId'";
    $statement= $db->exec($query);
   
    
}

?>
