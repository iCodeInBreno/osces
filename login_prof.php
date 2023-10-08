<?php

include('connect.php');

function function_alert($message) {
  echo "<script>alert('$message');</script>";
}

if(isset($_POST['userp']) || isset($_POST['password'])) {

  if(strlen($_POST['userp']) == 0) {
    echo function_alert("Preencha o usuario");
  } else if(strlen($_POST['password']) == 0) {
    echo function_alert("Preencha a senha");
  } else {

    $userp = $mysqli->real_escape_string($_POST['userp']);
    $password = $mysqli->real_escape_string($_POST['password']);

    $sql_code = "SELECT * FROM login_prof WHERE userp = '$userp' AND password = '$password'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na database SQL: " . $mysqli->error);

    $quantify = $sql_query->num_rows;

    if($quantify == 1) {

      $user = $sql_query->fetch_assoc();

      if(!isset($_SESSION)) {
        session_start();
      }

      $_SESSION['id'] = $user['id'];
      $_SESSION['name'] = $user['name'];

      header("Location: main_prof/index.php");

    } else {
      echo function_alert("Usuario ou Senha incorretos!");
    }

  }

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@500"
    />
    <title>OSCES - Login do Professor.</title>
    <link rel="stylesheet" type="text/css" href="login_prof.css" />
  </head>
  <body>
    <form action="" method="POST">
    <div id="firejet-html-app">
      <div
        class="bg-[#1862A7] h-[950px] w-[1440px] gap-[0] pr-[49px] flex items-center"
      >
        <div class="bg-[#353945] pt-[207px] pb-[475px] pr-[5px]">
          <div class="w-[713px] h-[268px] bg-image-2x bg-center bg-cover"></div>
        </div>
        <div class="w-[0] h-[950px] outline outline-1 outline-[#EDF2F7]"></div>
        <div class="[max-width:648px] h-[882px] w-[48.4%] ml-6">
          <div
            class="h-[882px] gap-[30px] py-[50px] self-stretch flex w-full flex-col justify-center items-center"
          >
            <div
              class="font-inter text-[#27272E] gap-3 flex flex-col items-start text-left"
            >
              <p class="w-[335px] text-[28px] font-[600] leading-[1.36]">
                LOGIN
              </p>
              <p class="w-[335px] font-[400] leading-[1.62] text-base">
                Informe seus dados abaixo e faça seu login.
              </p>
            </div>
            <div
              class="w-[424px] gap-[30px] font-inter font-[500] pt-6 flex flex-col items-start text-left"
            >
              <div class="w-full">
                <div
                  class="w-full gap-2 flex flex-col items-start self-stretch"
                >
                  <div
                    class="h-[17px] text-[#425466] w-full flex items-center justify-center"
                  >
                    <p class="w-[424px] h-[17px] text-sm">Informe seu nome de usuario:</p>
                  </div>
                  <div>
                    <input type="text" name="userp" placeholder="Usuario" class="h-[46px] bg-[#EDF2F7] pt-[15px] pb-[17px] pr-[267px] text-[#7A828A] w-full pl-4 rounded-md">
                    <div class="absolute gap-2.5">
                    </div>
                  </div>
                </div>
              </div>
              <div class="w-full">
                <div class="w-full gap-2 flex flex-col items-start self-stretch">
                  <div class="h-[17px] text-[#425466] w-full flex items-center justify-center">
                    <p class="w-[424px] h-[17px] text-sm">Informe sua Senha:</p>
                  </div>
                  <div>
                    <input type="password" name="password" placeholder="Senha" class="h-[46px] bg-[#EDF2F7] pt-[15px] pb-[17px] pr-[263px] text-[#7A828A] w-full pl-4 rounded-md">
                    <div class="absolute gap-2.5">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button class="w-[424px] bg-[#141416] rounded-[90px] font-dm_sans text-[#FCFCFD] font-[700] gap-3 flex justify-center items-center text-center py-4 px-6">Entrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
</form>
  </body>
</html>