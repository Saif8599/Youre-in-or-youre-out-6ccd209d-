<?php
    include_once('connection.php')

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Film</title>
</head>
<body>
<a href="index.php">Terug</a>
<form method="POST" action="add_serie.php">
    <h1>Nieuwe serie</h1>
    <h2>
        <?php
            echo "Title : ";
            echo "<input type='text' name='title'>";
        ?>
    </h2>
    <h2>
        <?php
            echo "Rating : ";
            echo "<input type='text' name='rating'>";
        ?>
    </h2>
    <h2>
        <?php
            echo "Omschrijving : ";
            echo "<Textarea rows='5' cols='40' name='summary'></textarea>";
        ?>
    </h2>
    <h2>
        <?php
            echo "Awards : ";
            echo "<input type='text' name='has_won_awards'>";
        ?>
    </h2>
    <h2>
        <?php
            echo "Seasons : ";
            echo "<input type='text' name='seasons'>";
        ?>
    </h2>
    <h2>
        <?php
            echo "Country : ";
            echo "<input type='text' name='country'>";
        ?>
    </h2>
    <h2>
        <?php
            echo "Language : ";
            echo "<input type='text' name='spoken_in_language'>";
        ?>
    </h2>
    <?php
    if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $rating = $_POST['rating'];
            $omschrijving = $_POST['summary'];
            $awards = $_POST['has_won_awards'];
            $seizoen = $_POST['seasons'];
            $land = $_POST['country'];
            $taal = $_POST['spoken_in_language'];
    }
    ?>
    <h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = $_POST['title'];
                $rating = $_POST['rating'];
                $omschrijving = $_POST['summary'];
                $awards = $_POST['has_won_awards'];
                $seizoen = $_POST['seasons'];
                $land = $_POST['country'];
                $taal = $_POST['spoken_in_language'];

            if (empty($title) || empty($rating) || empty($omschrijving) || empty($awards) || empty($seizoen) || empty($land) || empty($taal)) {
                    $status = "Vul de lege velden";
            } else {
                $status = "Data verstuurd";
            }
                $sql = "INSERT INTO movies (title, rating, summary, has_won_awards, seasons, country, spoken_in_language)
                VALUES (:titel, :rating, :omschrijving, :awards, :seizoen :land :taal)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['titel' => $title, 'rating' => $rating, 'omschrijving' => $omschrijving,
                 'has_won_awards' => $awards, 'seasons' => $seizoen, 'country' => $land, 'spoken_in_language' => $taal]);
        }
            echo "<input type='submit' value='submit'>";
        ?>
    </h2>
</form>
</body>
</html>