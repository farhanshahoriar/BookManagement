<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $booksJson = file_get_contents('books.json');
        $books = json_decode($booksJson, true);
        $available = ("on" == $_GET['available']);
        $newBook = array('id'=> $id , 'title' =>$_GET['title'], "author"  =>$_GET['author'], "available" => $available ,"pages" =>$_GET['pages'],"isbn" =>$_GET['isbn']);
        array_push($books, $newBook);
        $outFile = json_encode($books);
        file_put_contents("books.json", $outFile);  
        echo 'book deleted';
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <form action="create.php" method="GET">
        <label>Book ID:</label>
        <input type="text"  name="id">
        <br>
        <label>Book Title:</label>
        <input type="text"  name="title">
        <br>
        <label>Author:</label>
        <input type="text"  name="author">
        <br>
        <label>Available:</label>
        <input type="checkbox"  name="available">
        <br>
        <label>Pages:</label>
        <input name="pages" type="number">
        <br>
        <label>isbn:</label>
        <input type="number"  name="isbn">
        <br>


        <input type="submit" value="Submit"/>
          
    </form>
</body>
</html>