<?php
if($_POST){
    $produktnavn = $_POST['produktnavn'];
    $produktinfo = $_POST['produktninfo'];
    $produktpris = $_POST['produktpris'];

    $conn = mysqli_connect('localhost', 'root', '', 'shop');
    mysqli_query($conn, "");

}



?>


<form action="" method="post">
    <label>Produktnavn</label><input type="text" name="produktnavn">
    <label>Produktinfo</label><textarea><input type="text" name="Produktinfo"></textarea>
    <label>Produktpris</label><input type="text" name="produktpris">
    <button type="submit" ></button>
</form>
