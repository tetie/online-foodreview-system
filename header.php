<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aaron foods</title>
    <link rel="stylesheet" href="mycss/style.css">
    <script src="JS/app.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
<style>
    .head{
        background: rgba(10,10,10,1);
        color: white;
        width: 100%;
        z-index: 1;
    }
    @media screen and (max-width: 500px) and (min-width: 200px) {
        .head{
            background: rgba(10,10,10,1);
            color: white;
            width: 100%;
            padding: 1rem;
            z-index: 1;
        }
    }

    ul li:hover{
        padding-left: 1rem;
        background: rgba(23,87,255,0.4);
    }
</style>
    <div id="main_nav" class="d-flex sticky-top head container-fluid justify-content-between align-items-center">
        <a class="navbar-brand "  href="index.php">Aarons and sons invest</a>
                <ul id="navbar" class="d-md-flex d-lg-flex d-none  list-unstyled">
                    <li class="nav-item mx-3 mt-3 px-2 py-2">
                        <a class="nav-link active" aria-current="page" href="food.php">Foods</a>
                    </li>

                    <li class="nav-item mx-3 mt-3 px-2 py-2">
                        <a class="nav-link" href="reviews.php">Reviews</a>
                    </li>
                    <li class="nav-item mx-3 mt-3 px-2 py-2">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    </li>
                    <li class="nav-item mx-3 mt-3 px-2 py-2">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
       <div style="position: absolute;top:1.1rem;right: 1rem;" id="show" style="font-size: 29px;"> <i class="bi d-sm-block d-md-none d-lg-none bi-list"></i></div>


    </div>
</div>
<script>
    const main_nav = document.getElementById('main_nav')
    const show = document.getElementById('show')
    const navbar = document.getElementById('navbar')
    show.addEventListener('click',()=>{
        navbar.classList.toggle('d-none')
        main_nav.classList.toggle('flex-column')
        main_nav.classList.toggle('align-items-center')
    })
</script>
</body>
</html>