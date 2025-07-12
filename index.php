<!DOCTYPE html> <!-- Deklaracija dokumenta, HTML5 standard -->
<html lang="sr" dir="ltr"> <!-- Postavlja jezik na srpski, tekst se čita s leva na desno -->
<head>
    <meta charset="UTF-8"> <!-- Karakterni set, omogućava prikaz svih srpskih slova i specijalnih znakova -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsive dizajn, prilagođava veličinu stranice uređaju -->
    <meta name="author" content="Bane (NoOneNeo) Paunović"> <!-- Informacija o autoru stranice -->
    <meta name="keywords" content="PHP car search app, car listing website, vehicle database PHP, search cars online, auto listing PHP, car information system"> <!-- Ključne reči za SEO optimizaciju -->
    <meta name="description" content="PHP car search app with responsive design. Search cars, view vehicle details, and filter listings."> <!-- Kratki opis stranice za pretraživače -->
    <meta name="robots" content="index, follow"> <!-- Dozvoljava pretraživačima da indeksiraju i prate linkove sa stranice -->
    <title>PHP Car Showcase – Simple Vehicle Database Frontend</title> <!-- Naslov stranice koji se prikazuje u tabu browsera -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Uključivanje Bootstrap CSS frameworka -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> <!-- Uključivanje Bootstrap JS bundle-a -->
    <link rel="icon" type="image/x-icon" href="logo.png"> <!-- Ikonica za tab i bookmarks -->
    <link rel="apple-touch-icon" href="logo.png"> <!-- Ikonica za Apple uređaje, kada se stranica sačuva na početni ekran -->
    <?php require 'db.php'?> <!-- Uključivanje PHP fajla za konekciju sa bazom podataka -->
</head>
<body>

    <nav class="navbar navbar-expand navbar-light data-bs-theme=light bg-light"> <!-- Navigaciona traka sa Bootstrap klasama: navbar-expand omogućava širenje na većim ekranima, navbar-light za svetlu temu, bg-light za svetlu pozadinu -->
        <a href="index.php" class="navbar-brand"> Vozila </a> <!-- Link ka početnoj strani sa tekstom "Vozila", klasa navbar-brend služi za logo ili naziv sajta u navigaciji -->
    </nav> <!-- Zatvaranje navigacione trake -->

    <div class="container-fluid">
        <div calss="row">
            <div class="col-8 mx-auto"> 
                <h3 class="fs-3">Search Cars</h3>
                <form action="carInfo.php" method="get">
                    <div class="input-group">
                        <div class="position-relative flex-grow-1">
                            <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-secondary"></i>
                            <input 
                                type="text" 
                                name="search" 
                                class="form-control ps-5" 
                                placeholder="<?php if(isset($_GET['error'])){
                                    echo "Ne postoji podatak, molim Vas pokusajte ponovo!";
                                }else{
                                    echo "Pretraži";
                                } ?>">
                        </div>
                            <button class="btn btn-outline-secondary " type="submit" name="subBtn">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <br>
        <div class="row">

            <div class="col-8 offset-2">

                <div class="row">
                    <?php foreach($db as $car): ?>
                    <div class="col-3 " text-center>
                        <a href="carInfo.php?id=<?php echo $car['id']; ?>">
                            <div class="card">                              
                                <div class="card-header"> <?php echo $car ['brend']; ?></div>
                                <div class="card-body"> <?php echo $car['name']; ?></div>
                                <img src="<?php echo $car['slika']; ?>" class="card-img-top" alt="<?php echo $car['name']; ?>">                           
                                <div class="card-footer"> 
                                    <button class="btn btn-primary btn-sm"> <?php echo $car ['price']. ' €'; ?> </button>
                                    <button class="btn btn-<?php if($car ['used']) {
                                        echo "warning";
                                    }else{
                                        echo "success";
                                    }?> btn-sm"> <?php if($car['used']){
                                    echo "KORIŠĆEN";
                                    }else{
                                        echo "NOV";   
                                    } ?> </button>
                                </div>
                        </a>
                    </div>

                </div>
                    <?php endforeach; ?>
            </div>
        </div>
     </div>
</body>
</html>




