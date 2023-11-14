<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num_addresses = $_POST['numAddresses'];
    $addresses = [];

    for ($i = 0; $i < $num_addresses; $i++) {
        $address = [
            'street' => $_POST["street_$i"],
            'street_nb' => $_POST["street_nb_$i"],
            'type' => $_POST["type_$i"],
            'city' => $_POST["city_$i"],
            'zipcode' => $_POST["zipcode_$i"]
        ];

        $addresses[] = $address;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Confirmation</title>
</head>
<body>
    <h2>Confirmez vos adresses:</h2>
    <ul>
        <?php foreach ($addresses as $address) { ?>
            <li>
                <strong>Street:</strong> <?php echo $address['street']; ?><br>
                <strong>Street Number:</strong> <?php echo $address['street_nb']; ?><br>
                <strong>Type:</strong> <?php echo $address['type']; ?><br>
                <strong>City:</strong> <?php echo $address['city']; ?><br>
                <strong>Zip Code:</strong> <?php echo $address['zipcode']; ?><br>
            </li>
        <?php } ?>
    </ul>
    <form action="index.html">
        <button type="submit">Modifier les informations</button>
    </form>
</body>
</html>
<?php } ?>
