<?php
if($_POST){
    $produktnavn = $_POST['produktnavn'];
    $produktinfo = $_POST['produktinfo'];
    $produktpris = $_POST['produktpris'];

    $fejl = 0; //fejl-counter

    ## produktnavn

    if (isset($_POST['produktnavn'])){ // test om variablen eksisterer
        if (empty($_POST['produktnavn'])){ // test om variablen er tom
            $fejlproduktnavn = 'Du skal udfylde feltet, klaphat';
            ++$fejl;
        }else if (preg_match('/\d/', $_POST['produktnavn']) ) { // test om varibel indeholder tal
            $fejlproduktnavn = "DOH! Du ka' sgu' da ikke hedde noget med tal i. Spade.";
            ++$fejl;
            } else {//success
                $produktnavn = $_POST['produktnavn'];
            }
        }





    ## produktinfo

    if (isset($_POST['produktinfo'])){ //test om variablen eksistere
        if (empty($_POST['produktinfo'])){ // test om variablen er tom
            $fejlproduktinfo = 'Du skal udfylde feltet, klaphat';
            ++$fejl;
        }elseif (strlen($_POST['produktinfo']) <= 15){ //tjekker længden på strengen
            $fejlproduktinfo = 'Du skal bruge mere en 15 tegn';
            ++$fejl;
        }else { // success
            $produktinfo = $_POST['produktinfo'];
        }
    }

    ## pruduktpris

    if (isset($_POST['produktpris'])){ //test om variablen eksistere
        if (empty($_POST['produktpris'])){ // test om variablen er tom
            $fejlproduktpris = 'Du skal skrive en pris, klaphat';
        }elseif (!is_numeric($_POST['produktpris'])){
            $fejlproduktpris = 'Du må kun skrive tal her';
            ++$fejl;
        }else {//success
            $produktpris = $_POST['produktpris'];
        }
    }

    ## Fejlhåndtering

    if ($fejl === 0) {
        $conn = mysqli_connect('localhost', 'root', '', 'shop');
        mysqli_query($conn, "INSERT INTO `produkter` (produktnavn, produktinfo, produktpris) VALUES('$produktnavn','$produktinfo','$produktpris')");
        mysqli_close($conn);

        $produktnavn = '';
        $produktinfo = '';
        $produktpris = '';
    }else {
        $errormessage = 'Ja du er så dumpet';
    }








}





?>


<form action="" method="post">
    <p><?=@$success;?></p>
    <label>Produktnavn</label><input type="text" name="produktnavn">
    <p><?=@$fejlproduktnavn?></p>
    <label>Produktinfo</label><textarea name="produktinfo"></textarea>
    <p><?=@$fejlproduktinfo?></p>
    <label>Produktpris</label><input type="text" name="produktpris">
    <p><?=@$fejlproduktpris?></p>
    <p><?=@$errormessage;?></p>
    <button type="submit">Opret</button>
</form>
