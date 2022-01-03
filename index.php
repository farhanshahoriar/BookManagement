<?php
        $booksJson = file_get_contents('books.json');
        $books = json_decode($booksJson, true);
        $availablity = array(true =>'Yes', false =>'No');
        $key = "";
        if(isset($_GET['key'])){
            $key = $_GET['key'];
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
    <table border = "1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Availablity</th>
            <th>Pages</th>
            <th>ISBN</th>
            <th>Delete</th>
        </tr>
            <?php foreach($books as $book): 
                if($key != "" && preg_match("/{$key}/i", $book['title']) == false) continue;
                ?>
            <tr>
                <th> <?php echo $book['id']; ?> </th>
                <th> <?php echo $book['title']; ?> </th>
                <th> <?php echo $book['author']; ?> </th>
                <th> <?php echo $availablity[$book['available']]; ?> </th>
                <th> <?php echo $book['pages']; ?> </th>
                <th> <?php echo $book['isbn']; ?> </th>
                <th> <a href="<?php echo 'delete.php?id='.$book['id'] ?>">
                <button >Delete</button>
                </a>
                </th>
            </tr>
            <?php endforeach; ?> 
    </table>
    <br>
    <a href="create.php"><button>Create New Books</button></a>
    <br>
    <br>
    <br>
    <form>
        <label>Enter part of book title :</label>
        <input type="text" name="key"> </input><br>
        <input type="submit" value="Search book">
    </form>
</body>
</html>