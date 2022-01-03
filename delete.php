<?php
    $id = $_GET['id'];
    $booksJson = file_get_contents('books.json');
    $books = json_decode($booksJson, true);
    foreach($books as $key => $book){
        if($book['id'] == $id){
            array_splice($books, $key, 1);
            break;
        }
    }
    $outFile = json_encode($books);
    file_put_contents("books.json", $outFile);  
    echo 'book deleted';
    header('Location: index.php');
?>