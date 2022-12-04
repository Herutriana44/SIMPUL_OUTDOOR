<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Internal CSS -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap'); 

        .button-primary {
            height: 50px;
            background-color: #FF0000;
            outline: none;
            width: 100px;
            transition: all 0.30s ease-in-out;
            font: 20px 'Poppins', sans-serif;
            border: 1px solid #FF0000;
            border-radius: 25px;
            color: #fff;
            cursor: pointer;
        }


    </style>
</head>
<body>
    <h1>Selamat Datang ...</h1>
    <button id="btn_logout" class="button-primary">
        Log out
    </button>

    <script>
        //deklarasi variabel untuk "btn_logout"
        let btn_logout = document.getElementById("btn_logout");

        btn_logout.addEventListener('click', function(){
            //alihkan ke controller dashboard function setLogout
            location.href = "<?php echo site_url("Dashboard/setLogout"); ?>"
        });
    </script>
</body>
</html>