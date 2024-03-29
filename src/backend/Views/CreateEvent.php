<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wow Planner</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kurale&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../src/style/edit.css">
</head>

<body>
    <h2 class="text-center">Create New Event</h2>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="<?php echo URL_AUTH_Profile . "/Events/Create/treatment" ?>" method="POST">
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="horaire">Time:</label>
                        <input type="time" class="form-control" id="horaire" name="horaire" required>
                    </div>
                    <div class="form-group">
                        <label for="raid">Raid:</label>
                        <select class="form-control" id="raid" name="raid" required>
                            <option value="">Choose a raid</option>
                            <?php foreach ($_SESSION['allRaids'] as $raid) : ?>
                                <option value="<?php echo $raid['id']; ?>">
                                    <?php echo $raid['nom'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="button-container">
                        <button type="submit" class="button-gold">Create</button>
                        <a class="button-red" href="<?php echo URL_AUTH_Profile . "/Characters" ?>">Cancel</a>
                    </div>
                </form>


            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>