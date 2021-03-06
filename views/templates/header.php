<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/public/assets/img/favicon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.0/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <link rel="stylesheet" href="/public/assets/css/<?=$stylesheet ?? 'style.css' ?>">
    <link rel="stylesheet" href="/public/assets/css/<?=$profilPatientPage ?? 'style.css' ?>">
    <link rel="stylesheet" href="/public/assets/css/<?=$styleList ?? 'style.css' ?>">
    <link rel="stylesheet" href="/public/assets/css/<?=$addAppointmentPage ?? 'style.css' ?>">
    <link rel="stylesheet" href="/public/assets/css/<?=$addPatientPage?? 'style.css' ?>">
    <link rel="stylesheet" href="/public/assets/css/<?=$profilAppointmentPage?? 'style.css' ?>">
    <link rel="stylesheet" href="/public/assets/css/<?=$modifAppointementPage?? 'style.css' ?>">
    <link rel="stylesheet" href="/public/assets/css/<?=$listApptPage?? 'style.css' ?>">



    <title>CLINIQUE JACOBINS</title>
</head>

<body>
<nav class="navbar navbar-expand-sm navbar-light bg-light"id="test">
    <a class="navbar-brand" href="/controllers/addPatientController.php"><img class="ms-3"src="/public/assets/img/icons8-stetoscope-icon-64.png">CLINIQUE JACOBINS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"> </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav ms-auto me-4 fs-5">
            <li class="nav-item">
                <a class="nav-link" href="/controllers/addPatientController.php">Ajout Patient</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/controllers/listPatientController.php">Liste des Patients</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/controllers/addAppointmentController.php">Prendre un Rendez-vous</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/controllers/listAppointmentController.php">Liste des Rendez-vous</a>
            </li>
        </ul>
    </div>
</nav>


