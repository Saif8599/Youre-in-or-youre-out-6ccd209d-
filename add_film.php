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
<form method="POST" action="add_film.php">
    <h1>Nieuwe film</h1>
    <h2>
        <?php
            echo "Title : ";
            echo "<input type='text' name='title'>";
        ?>
    </h2>
    <h2>
        <?php
            echo "Duur : ";
            echo "<input type='text' name='length_in_minutes'>";
        ?>
    </h2>
    <h2>
        <?php
            echo "Datum van uitkomst : ";
            echo "<input type='text' name='released_at'>";
        ?>
    </h2>
    <h2>
        <?php
            echo "Land van uitkomst : ";
            echo "<input type='text' name='country_of_origin'>";
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
            echo "Youtube trailer ID : ";
            echo "<input type='text' name='youtube_trailer_id'>";
        ?>
    </h2>
    <?php
    if (isset($_POST['submit'])) {
        $id = $_REQUEST['id'];
        $title = $_REQUEST['title'];
        $duur = $_REQUEST['length_in_minutes'];
        $datum = $_REQUEST['released_at'];
        $land = $_REQUEST['country_of_origin'];
        $omschrijving = $_REQUEST['summary'];
    }
    ?>
    <h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = $_POST['title'];
                $duur = $_POST['length_in_minutes'];
                $datum = $_POST['released_at'];
                $land = $_POST['country_of_origin'];
                $omschrijving = $_POST['summary'];

            if (empty($title) || empty($duur) || empty($datum) || empty($land) || empty($omschrijving)) {
                    $status = "Vul de lege velden";
            } else {
                    $status = "Data verstuurd";
            }

                $sql = "INSERT INTO movies (title, length_in_minutes, released_at, country_of_origin, summary)
                VALUES (:titel, :duur, :datum, :land, :omschrijving)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['titel' => $title, 'length_in_minutes' => $duur, 'released_at' => $datum, 'country_of_origin' => $land, 'summary' => $omschrijving,]);
        }
            echo "<input type='submit' value='submit'>";
        ?>
    </h2>
</form>
</body>
</html>