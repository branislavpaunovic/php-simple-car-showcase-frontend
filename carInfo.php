<?php // Početak PHP koda
require 'db.php'; // Uključivanje baze podataka iz db.php fajla

if(isset ($_GET['id'])){ // Provera da li je preko URL-a prosleđen ID automobila
    $id = $_GET['id']; // Čuvanje ID-ja iz GET parametra u promenljivu

    $automobili = array_filter($db, function ($element) // Filtriranje niza $db pomoću PHP funkcije array_filter
    {
        global $id; // Korišćenje globalne promenljive $id unutar anonimne funkcije
        return $element['id'] == $id; // Vraća automobile čiji ID se poklapa sa traženim
    });
 } elseif($_GET['search']) { // Provera da li postoji GET parametar za pretragu
    $search = $_GET['search']; // Čuvanje unetog pojma za pretragu
    $automobili = array_filter($db, function($element) { // Filtriranje baze automobila prema pretrazi
        global $search; // Uzimanje globalne promenljive $search
        // Pretraga po brendu, imenu ili ceni:
        return strcasecmp($element['brend'], $search) == 0 // Ne razlikuje velika i mala slova
        || strcasecmp($element['name'], $search) == 0
        || $element['price'] == $search; // Cena ne koristi strcasecmp jer je broj
   });
   if(count($automobili) == 0){ // Ako nema rezultata
    header("Location: index.php?error=1"); // Preusmeravanje na index.php sa error porukom
   }
 }
?>
<!DOCTYPE html> <!-- Deklaracija HTML5 dokumenta -->
<html lang="sr" dir="ltr"> <!-- Jezik srpski, tekst s leva na desno -->
<head>
    <meta charset="UTF-8"> <!-- Postavljanje karakter seta na UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsive dizajn -->
    <meta name="author" content="Bane (NoOneNeo) Paunović"> <!-- Autor sajta -->
    <meta name="keywords" content="PHP car search app, car listing website, vehicle database PHP, search cars online, auto listing PHP, car information system"> <!-- Ključne reči za SEO -->
    <meta name="description" content="PHP car search app with responsive design. Search cars, view vehicle details, and filter listings."> <!-- Opis stranice -->
    <meta name="robots" content="index, follow"> <!-- Dozvola robotima za indeksiranje -->
    <title>PHP Car Showcase – Simple Vehicle Database Frontend</title> <!-- Naslov stranice -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap JS -->
    <link rel="icon" type="image/x-icon" href="logo.png"> <!-- Favicon -->
    <link rel="apple-touch-icon" href="logo.png"> <!-- Apple ikonica -->
    <?php require 'db.php'?> <!-- Ponovno uključivanje baze (može se optimizovati) -->
</head>

<body>
    <nav class="navbar navbar-expand navbar-light data-bs-theme=light bg-light"> <!-- Bootstrap navbar -->
        <a href="index.php" class="navbar-brend"> Automobil </a> <!-- Povratak na početnu stranicu -->
    </nav>

<div class="jumbotron text-center"> <!-- Jumbotron sekcija za naslov -->
    <h2>
    <?php foreach($automobili as $auto): ?> <!-- PHP petlja: prolazak kroz filtrirane automobile -->
        <span><?php echo $auto['brend']; ?></span> <!-- Prikaz brenda automobila -->
    <?php endforeach; ?>
    </h2>
</div>

<div class="container-fluid"> <!-- Bootstrap kontejner -->
    <div class="row"> <!-- Red u grid sistemu -->
        <div class="col-8 offset-2"> <!-- Kolona širine 8, centrirana pomoću offset-a -->
            <div class="row"> <!-- Unutrašnji red -->
            <?php foreach($automobili as $auto): ?> <!-- Ponovno prolazak kroz automobile -->
                <div class="col-6" style="outline:1px solid #ddd"> <!-- Kolona širine 6 sa okvirom -->
                    <h3 class="fs-3"> <?php echo $auto['name'];?> </h3> <!-- Prikaz imena/modela automobila -->
                    <img src="<?php echo $auto['slika']; ?>" class="card-img-top" alt="<?php echo $auto['name']; ?>"> <!-- Slika automobila -->
                    <hr> <!-- Horizontalna linija -->
                    <p> <?php echo $auto['info'];?> $</p> <!-- Prikaz dodatnih informacija o automobilu -->
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html> <!-- Zatvaranje HTML dokumenta -->
