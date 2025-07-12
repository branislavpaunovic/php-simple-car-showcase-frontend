<?php // Početak PHP koda

// Definisanje niza $db koji sadrži listu automobila sa detaljima
$db = [

    [ // Prvi automobil u nizu
        "id" => 1, // Jedinstveni ID automobila
        "brend" => "Škoda", // Marka automobila
        "name" => "Superb", // Model automobila
        "price" => 18000, // Cena automobila u evrima
        "used" => true, // Status automobila: true znači da je korišćen
        "slika" => "superb.png", // Naziv slike automobila
        "info" => "Comby Style 2.0 TDI DSG 4x4, Motor : 190 KS,  Vrata : 5, Broj sedišta : 5, Fuel consumption : 6.1l/100km, Maksimalna brzina : 226 km/h ", // Opis automobila
    ],

    [ // Drugi automobil u nizu
        "id" => 2, 
        "brend" => "Škoda", 
        "name" => "Kodiaq", 
        "price" => 21000, 
        "used" => false, // false znači da je automobil nov
        "slika" => "kodiaq.png", 
        "info" => "2.0 TDI, DSG 4x4, Motor : 190 KS,  Vrata : 5, Broj sedišta : 5, Fuel consumption : 6.6l/100km, Maksimalna brzina : 210 km/h",
    ],

    [ // Treći automobil u nizu
        "id" => 3,
        "brend" => "Volkswagen",
        "name" => "Passat",
        "price" => 12000,
        "used" => true,
        "slika" => "passat.png",
        "info" => "B7 2.0 TDI, Motor : 177 KS,  Vrata : 5, Broj sedišta : 5, Fuel consumption : 6.7l/100km, Maksimalna brzina : 220 km/h ",
    ],

    [ // Četvrti automobil u nizu
        "id" => 4,
        "brend" => "Volkswagen",
        "name" => "Golf",
        "price" => 19000,
        "slika" => "golf.png",
        "used" => false,
        "info" => "1.0 TSI, Motor : 116 KS,  Vrata : 5, Broj sedišta : 5, Fuel consumption : 5.7l/100km, Maksimalna brzina : 192 km/h ",
    ]
];

?> <!-- Zatvaranje PHP koda -->
