<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

    $filter = $hotels;
    $parking = !empty($_GET['parking']);
    $has_vote = !empty($_GET['vote']);
    $vote = $_GET['vote'];

    if($parking){ 
        $temp_hotels=[];
        foreach($filter as $hotel){
            if($hotel['parking']){
                $temp_hotels[]=$hotel;
            }
        }
        $filter = $temp_hotels;
    }

    if($has_vote){
        $temp_hotels=[];
        foreach($filter as $hotel){
            if($hotel['vote']>= intval($vote)){
                $temp_hotels[]=$hotel;
            }
        }
        $filter = $temp_hotels;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Hotel</title>
</head>
    <body>
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <section>
                        <form action="index.php" method="GET">
                            <div class="row align-items-center">
                                <div class="form-check col-auto">
                                    <input class="form-check-input" type="checkbox" id="gridCheck1" name="parking" <?php if ($parking) :  ?> checked <?php endif; ?>>
                                    <label class="form-check-label" for="gridCheck1">
                                        parking
                                    </label>
                                </div>
                                <div class="col-auto">
                                    <select class="form-select" aria-label="Default select example" name="vote">
                                        <option selected value="">inserisci voto</option>
                                        <?php for($i=1;$i<=5;$i++): ?>
                                            <option value="<?php echo $i; ?>" <?php if($vote == $i): ?> selected <?php endif; ?>>voto: <?php echo $i; ?></option>
                                        <?php endfor;?>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary">cerca</button>
                                </div>   
                            </div>
                        </form>
                    </section>
                    <?php if(count($filter)): ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>DESCRIPTION</th>
                                <th>PARKING</th>
                                <th>VOTE</th>
                                <th>DISTANCE TO CENTER</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($filter as $hotel) : ?>
                            <tr>
                                <td><?php echo $hotel['name'] ?></td>
                                <td><?php echo $hotel['description'] ?></td>
                                <td><?php echo $hotel['parking'] ? 'yes' : 'no' ?></td>
                                <td><?php echo $hotel['vote'] ?></td>
                                <td><?php echo $hotel['distance_to_center'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else : ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Nessun hotel trovato
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </body>
</html>