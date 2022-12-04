<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>401</title>

  <!-- internal css -->
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap'); 

    :root {
      --merah : #FF0000;
      --putih : #FFFFFF;
    }

    .area-login {
      width: 30%;
      height: calc(100vh - 3vh);
      margin-left: 35%;
      margin-right: 35%;
    }

    .frame-login {
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .bingkai-login {
      width: 100%;
      background-color: cadetblue;
      padding: 10px;
      border-radius: 20px;
    }

    .content-login {
      background-color: #fff;
      border-radius: 10px;
      padding: 10px;
    }

    .header-login {
      text-align: center;
      font: bold 25px 'Poppins', sans-serif;
      color: #555;
      padding-bottom: 20px;

    }

    .komponen-login {
      display: flex;
      flex-direction: column;
      width: 100%;

    }

    .text-login {
      height: 20px;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 15px;
      border: 1px solid #777;
      outline: none;
      transition: all 0.30s ease-in-out;
      font: 16px 'Poppins', sans-serif;
    }

    .text-login:focus {
      border: 1px solid #FF0000;
      box-shadow: 0 0px 10px rgba(255, 0, 0, 255);
    }

    .tombol-login {
      display: flex;
      width: 100%;
      margin-bottom: 10px;
    }

    .checkbox-login {
      display: flex;
      width: 100%;
      margin-bottom: 20px;
      font: 16px 'Poppins', sans-serif; 
      color: #333;     
    }

    .button-primary {
      height: 50px;
      background-color: #FF0000;
      outline: none;
      width: 49%;
      transition: all 0.30s ease-in-out;
      font: 20px 'Poppins', sans-serif;
      border: 1px solid #FF0000;
      border-radius: 25px;
      color: #fff;
      cursor: pointer;
    }

    .separate-login {
      width: 2%;
    }

    .button-secondary {
      height: 50px;
      background-color: #e3e3e3;
      outline: none;
      width: 49%;
      transition: all 0.30s ease-in-out;
      font: 20px 'Poppins', sans-serif;
      border: 1px solid #777;
      border-radius: 25px;
      color: #333;
      cursor: pointer;
    }

    .pesan_error {
      color : var(--merah);
      font : 12px 'Poppins', sans-serif;
      margin-top : -15px;
      /* display : none; */
    }

  </style>
</head>

<body>
  <section class="area-login">
    <div class="frame-login">
      <div class="bingkai-login">
        <div class="content-login">
          <div class="header-login">Unauthorized !!!</div>

        </div>
      </div>
    </div>
  </section>
</body>
</html>