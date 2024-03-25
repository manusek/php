<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ail_lab4";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Pobrać zawartość tabeli questions
    //...

    //zapytanie i jego wykonanie
    $stmt = $conn->prepare("SELECT * FROM questions");
    $stmt->execute();

    //pobieranie
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Fail: " . $e->getMessage();
}
?>

<!doctype html>
<html lang="pl" data-bs-theme="">
  <head>
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zad8</title>
    <link href="css/bootstrap.css" rel="stylesheet">
  </head>
  <body>
    <div id="inne" class="container mt-5 mb-3">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md-8">
                <h2>Zapytania o ofertę</h2>
                <!-- Wygenerować tabelkę HTML zawierającą wcześniej pobrane dane -->
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Email</th>
                            <th scope="col">Grupa</th>
                            <th scope="col">Cena</th>
                            <th scope="col">Komentarz</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $row){ ?>
                        <tr>
                            <th scope="row"><?php echo $row['id']?></th>
                            <td scope="row"><?php echo $row['email']?></td>
                            <td scope="row"><?php echo $row['offer_type']?></td>
                            <td scope="row"><?php echo $row['budget']?></td>
                            <td scope="row"><?php echo htmlspecialchars($row['comment'])?></td>  
                        </tr>
                       <?php } ?>
                    </tbody>
                    <!-- konwertuje znaki html na encje -->
                </table>
            </div>
        </div> 
    <script src="js/bootstrap.bundle.js"></script>
  </body>
</html>

