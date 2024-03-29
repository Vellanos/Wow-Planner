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
    <link rel="stylesheet" href="../../../src/style/user.css">
</head>

<body>
    <h2 class="text-center">Create New Character</h2>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="<?php echo URL_AUTH_Profile . "/Characters/Create/treatment" ?>" method="POST">
                    <div class="form-group">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="Classe">Class:</label>
                        <select class="form-control" id="Classe" name="Classe" required>
                            <option value="">Choose a class</option>
                            <?php foreach ($_SESSION['allClass'] as $class) : ?>
                                <option value="<?php echo $class['id']; ?>">
                                    <?php echo $class['name_class'] . ' ' . $class['name_spec']; ?>
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