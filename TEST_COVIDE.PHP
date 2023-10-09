<?php

echo'<H2>Formulaire de test de covide</H2>
<form action="" method="post">
    <div>
        <h3>Information Personnel(IP):</h3>
        <label for="">Nom</label> <input type="text" name="nom" required><br><br>
        <label for="">prenom</label> <input type="text" name="prenom" required><br><br>
        <label for="">poids</label> <input type="number" name="poids" required><br><br>
        <label for="">age</label> <input type="number" name="age" required>
    </div>
    
    <div>

        <h3>Température(T°c):</h3>
        <label for="">Quelle est votre température corporelle?</label> 
        <input type="number" name="temperature" value="temperature"  required>°c
       
    </div>
    <div>

        <h3>Maux de tête(MT):</h3>
        <label for="">Avez-vous les maux de tête?</label> 
        <input type="radio" name="tete" value="OUI" required>OUI
        <input type="radio" name="tete"  value="NON" required>NON
       
    </div>

    <div>
        <h3>(D):</h3>
        <label for="">Avez-vous la diarrée?</label> 
        <input type="radio" name="diarre" value="OUI" required>OUI
        <input type="radio" name="diarre"  value="NON" required>NON
    </div>
    <div>
        <h3>(T):</h3>
        <label for="">Avez-vous la Toux?</label> 
        <input type="radio" name="toux" value="OUI" required>OUI
        <input type="radio" name="toux"  value="NON" required>NON
    </div>
    <div>
        <h3>(PO):</h3>
        <label for="">Avez-vous une perte odorat ? </label> 
        <input type="radio" name="odorat" value="OUI" required>OUI
        <input type="radio" name="odorat"  value="NON" required>NON
    </div>

    <input type="submit" value="Soumettre">
    
</form>';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    // $poids = $_POST["poids"];
    $poids = intval($_POST["poids"]);
    // $age = $_POST["age"];
    $age = intval($_POST["age"]);
    // $temperature = $_POST["temperature"];
    $temperature = floatval($_POST["temperature"]);
    $tete= $_POST["tete"];
    $diarre = $_POST["diarre"];
    $toux = $_POST["toux"];
    $odorat = $_POST["odorat"];

    if ($poids <= 0 || $age <= 0 || $temperature <= 0) {
        echo "Veuillez saisir des valeurs positives et différentes de zéro pour le poids, l'âge et la température.";
    } else {

    // Calcul du pourcentage en fonction des réponses
    
            $pourcentage = 0;
   
    // Si la température est supérieure à 38 degrés, augmentez le pourcentage de risque
    if ($temperature > 38) {

        $pourcentage += 10;
    }
    // Si l'utilisateur les mau, augmentez le pourcentage de risque
    if ($tete == "OUI") {

        $pourcentage += 20;
    }

    // Si l'utilisateur a la diarrhée, augmentez le pourcentage de risque
    if ($diarre == "OUI") {

        $pourcentage += 20;
    }

   
    // Si l'utilisateur a la toux, augmentez le pourcentage de risque
    if ($toux == "OUI") {
        
       
        $pourcentage += 20;
    }

    // Si l'utilisateur a une perte d'odorat, augmentez le pourcentage de risque
    if ($odorat == "OUI") {
        
       
    $pourcentage += 20;
    }

    // Afficher le résultat
    echo '<h2>Résultat du test de COVID-19 pour ' . $nom . ' ' . $prenom . '</h2>';
    
   
    echo '<p>Pourcentage de risque : ' . $pourcentage . '%</p>';
}
}

?>