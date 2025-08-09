<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <!-- Simple HTML form to collect user input -->
    <form method="POST" action="index.php" class="m-3">
        <fieldset>
            <legend>Document</legend>
            <div class="mb-2">
                <label for="disabledTextInput" class="form-label">Name:</label>
                <input type="text" id="name" class="form-control" placeholder="Enter your name" name="name">
            </div>
            <div class="mb-2">
                <label for="disabledTextInput" class="form-label">Email:</label>
                <input type="text" id="email" class="form-control" placeholder="Enter your email" name="email">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Idade:</label>
                <input type="number" id="idade" class="form-control" placeholder="Enter your idade" name="idade">
            </div>
            <div class="mb-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck">
                    <label class="form-check-label" for="disabledFieldsetCheck">
                        Can’t check this
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="submit" class="btn btn-primary">Refresh</button>
        </fieldset>
    </form>

    <!-- PHP code to handle form submission -->
    <?php
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $idade = isset($_POST['idade']) ? (int)$_POST['idade'] : null;
    $validacao = true;

    // Basic validation for idade
    if ($idade < 18) {
        $validacao = false;
        echo "<div class='alert alert-danger m-3' role='alert'>Idade must be 18 or older.</div>";
    } else if ($idade >= 18) {
        echo "<div class='alert alert-success m-3' role='alert'>Form submitted successfully!</div>";
    } else {
        echo "";
    }

    // Display the submitted in screen
    echo  "<p>" . $name . " " . $email . " " . $idade . "</p>";
    ?>

</body>
<style>
    body {
        align-items: center;
        background-color: #f8f9fa;
    }
</style>

</html>