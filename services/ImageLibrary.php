<?php
class ImageLibrary
{
    // Deklaration einer Eigenschaft
    private $feldID;
    private $icnmaplist = array(
        "Ferien" => "icn_beach",
        "Geburtstag" => "icn_birthdaycake",
        "Geheimnis" => "icn_secret",
        "Abschied" => "icn_goodbye",
        "Nachwuchs" => "icn_schnuller",
        "Abschluss" => "icn_graduation",
        "Hochzeit" => "icn_wedding",
        "Auszeichnung" => "icn_medal",
        "Beförderung" => "icn_motivation",
        "Pensionierung" => "icn_retirement",
        "Lottogewinn" => "icn_jackpot",
        "einfach so" => "icn_dinosaur",
        "Wein" => "icn_wine",
        "Limonade" => "icn_food",
        "Bier" => "icn_beers",
        "Cocktails" => "icn_cocktail",
        "Champagner" => "icn_champagne",
        "Tee" => "icn_bubbletea",
        "Kaffee" => "icn_coffeecup",
        "Mineral" => "icn_mineralwater",
        "Gipfeli" => "icn_croissant",
        "Kuchen" => "icn_tart",
        "Chips" => "icn_chips",
        "Sandwich" => "icn_sandwich",
        "Gemüse" => "icn_vegetable",
        "Sushi" => "icn_sushi",
        "Früchte" => "icn_fruits",
        "Burger" => "icn_burger",
        "1" => "icn_am",
        "2" => "icn_pm",
        "3" => "icn_afternoon",
        "male" => "icn_male",
        "icn_male" => "icn_male",
        "icn_female" => "icn_female",
        "female" => "icn_female"
    );

    function __construct() {
        $this->feldID = "123";
    }
    public function getfeldID() {
        return $this->feldID;
    }

    public function getIcnName($string) {
        return $this->icnmaplist[$string];
    }

}
?>