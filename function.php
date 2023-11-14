<?php
include 'db_connection.php';

// Fonction pour ajouter une nouvelle adresse
function addAddress($street, $street_nb, $type, $city, $zipcode) {
    global $conn;
    
    $stmt = $conn->prepare("INSERT INTO addresses (street, street_nb, type, city, zipcode) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $street, $street_nb, $type, $city, $zipcode);
    $stmt->execute();
    $stmt->close();
}

// Fonction pour récupérer toutes les adresses de la base de données
function getAllAddresses() {
    global $conn;

    $sql = "SELECT * FROM addresses";
    $result = $conn->query($sql);

    $addresses = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $addresses[] = $row;
        }
    }
    return $addresses;
}

// Fonction pour mettre à jour une adresse existante
function updateAddress($id, $street, $street_nb, $type, $city, $zipcode) {
    global $conn;

    $stmt = $conn->prepare("UPDATE addresses SET street=?, street_nb=?, type=?, city=?, zipcode=? WHERE id=?");
    $stmt->bind_param("sisssi", $street, $street_nb, $type, $city, $zipcode, $id);
    $stmt->execute();
    $stmt->close();
}

// Fonction pour supprimer une adresse
function deleteAddress($id) {
    global $conn;

    $stmt = $conn->prepare("DELETE FROM addresses WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}
?>
