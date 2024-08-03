<?php
include 'lab1_connect.php';
$sql = 'SELECT * FROM books';

$stmt = $conn->prepare($sql);

$stmt->execute();

$listBooks = $stmt->fetchAll();
?>

<button><a href="2.php" type="submit">Thêm books</a></button>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
            <th>Genre</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($listBooks as $key => $value) {
            echo "<tr>
            <td>$value[id]</td>
            <td>$value[title]</td>
            <td>$value[author]</td>
            <td>$value[year]</td>
            <td>$value[genre]</td>
            </tr>";
        }
        ?>
    </tbody>
</table>