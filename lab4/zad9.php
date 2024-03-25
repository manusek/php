
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ail_lab4";
 
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    $stmt = $conn->prepare("SELECT * FROM questions");
       
        $stmt->execute();
 
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); //pobieram z bazy wartości do tabeli asocjacyjnej
 
} catch (PDOException $e) {
    echo "Fail: " . $e->getMessage();
}
 

if(isset($_GET['email'])){
    $email = $_GET['email'];
    try{
        $stmt = $conn->prepare("SELECT * FROM questions WHERE email = :email");
        $stmt->bindParam(':email', $email);  // przypisuje zmienna email do paratetru email
        $stmt->execute();
 
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e) {
        echo "Fail: " . $e->getMessage();
    }
}
?>
 
<!doctype html>
<html lang="pl" data-bs-theme="">
  <head>
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zad9</title>
    <link href="css/bootstrap.css" rel="stylesheet">
  </head>
  <body>
    <div id="inne" class="container mt-5 mb-3">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md-8">
                <h2>Zapytania o ofertę</h2>
                <!-- Wygenerować tabelkę HTML zawierającą wcześniej pobrane dane -->
                <form method="get">
                    <div class="form-group mt-2 mb-3">
                        <label for="exampleFormControlInput1">Adres email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="name@example.com" name="email">
                    </div>
                    <div class="form-group mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Filtruj</button>
                    </div>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Rodzaj oferty</th>
                            <th scope="col">Budżet</th>
                            <th scope="col">Komentarz</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $key => $result) : ?>
                        <tr>
                            <th scope="row"><?php echo $key + 1; ?></th>
                            <td><?php echo $result['email']; ?></td><!-- pobranie danych z tabeli asocjacyjnej -->
                            <td><?php echo $result['offer_type']; ?></td>
                            <td><?php echo $result['budget']; ?></td>
                            <td><?php echo $result['comment']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <script src="js/bootstrap.bundle.js"></script>
  </body>
</html>
 
 