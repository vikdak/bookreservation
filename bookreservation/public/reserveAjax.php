<?php

require_once __DIR__ ."/../core/Connections.php";

if(isset($_REQUEST['book_id'])&&(isset($_REQUEST['user_id']))){
        reserve($_REQUEST['user_id'], $_REQUEST['book_id']);
}else {
    echo 'nera tokio id ';
}

function reserve(int $userId, int $bookId)
{
    $connection = new Connections();
    $sql = "UPDATE books SET reserved=1, user_id=? WHERE id=? ";
    $stmt= $connection->connection->prepare($sql);
    $stmt->execute([$userId, $bookId]);
}

