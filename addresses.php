<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num_addresses = $_POST['numAddresses'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Adresses</title>
</head>
<body>
    <form action="confirmation.php" method="post">
        <?php for ($i = 0; $i < $num_addresses; $i++) { ?>
            <div class="address-container">
                <label for="street_<?php echo $i; ?>">Street:</label>
                <input type="text" id="street_<?php echo $i; ?>" name="street_<?php echo $i; ?>" maxlength="50" required>

                <label for="street_nb_<?php echo $i; ?>">Street Number:</label>
                <input type="number" id="street_nb_<?php echo $i; ?>" name="street_nb_<?php echo $i; ?>" required>

                <label for="type_<?php echo $i; ?>">Type:</label>
                <select id="type_<?php echo $i; ?>" name="type_<?php echo $i; ?>" maxlength="20" required>
                    <option value="livraison">Livraison</option>
                    <option value="facturation">Facturation</option>
                    <option value="autre">Autre</option>
                </select>

                <label for="city_<?php echo $i; ?>">City:</label>
                <select id="city_<?php echo $i; ?>" name="city_<?php echo $i; ?>" required>
                    <option value="Montreal">Montreal</option>
                    <option value="Laval">Laval</option>
                    <option value="Toronto">Toronto</option>
                    <option value="Quebec">Quebec</option>
                </select>

                <label for="zipcode_<?php echo $i; ?>">Zip Code:</label>
                <input type="text" id="zipcode_<?php echo $i; ?>" name="zipcode_<?php echo $i; ?>" pattern="[0-9]{6}" required>
            </div>
        <?php } ?>
        <input type="hidden" name="numAddresses" value="<?php echo $num_addresses; ?>">
        <button type="submit">Continuer</button>
    </form>
</body>
</html>
<?php } ?>
