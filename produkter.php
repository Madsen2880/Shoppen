<?php
#
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produkter</title>
</head>
<body>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Produktnavn</th>
                <th>produktinfo</th>
                <th>Produktpris</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $conn = mysqli_connect('localhost', 'root', '' , 'shop');
        $result = mysqli_query($conn, "SELECT id, produktnavn, produktinfo, produktpris FROM `produkter`"); //her hentes data fra databasen


        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        ?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['produktnavn']?></td>
            <td><?=$row['produktinfo']?></td>
            <td><?=$row['produktpris']?></td>
        </tr>
        <?php
        }

        ?>
        </tbody>
    </table>

</body>
</html>
