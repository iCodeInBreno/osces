<?php
include('connect.php');

function function_alert($message) {
  echo "<script>alert('$message');</script>";
}

if(isset($_POST['cpf']) || isset($_POST['password'])) {

  if(strlen($_POST['cpf']) == 0) {
    echo function_alert("Preencha o CPF!");
  } else if(strlen($_POST['password']) == 0) {
    echo function_alert("Preencha a Senha!");
  } else {

    $cpf = $mysqli->real_escape_string($_POST['cpf']);
    $password = $mysqli->real_escape_string($_POST['password']);

    $sql_code = "SELECT * FROM login_aluno WHERE cpf = '$cpf' AND password = '$password'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na databse SQL: " . $mysqli->error);

    $quantify = $sql_query->num_rows;
    if($quantify == 1) {

      $user = $sql_query->fetch_assoc();

      if(!isset($_SESSION)) {
        session_start();
      }

      $_SESSION['id'] = $user['id'];
      $_SESSION['name'] = $user['name'];

      header("Location: main_aluno/index.php");

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
    <title>OSCES - Login do usuario</title>
    <link rel="stylesheet" type="text/css" href="login_aluno.css" />
  </head>
  <body>
    <form action="" method="POST">
    <div id="firejet-html-app">
      <div
        class="h-[950px] w-[1440px] gap-[26px] flex bg-white items-center justify-between"
      >
        <div
          class="[flex-grow:1] bg-[#353945] gap-[0] flex h-full flex-col items-end pl-4"
        >
          <div class="w-[0] h-[950px] outline outline-1 outline-[#EDF2F7]"></div>
          <div class="mt-[-716px] items-center flex pr-3.5 w-full">
            <div class="w-[713px] h-[268px] bg-image-2x bg-center bg-cover"></div>
          </div>
        </div>
        <div class="[max-width:670.8267211914062px] h-[882px] w-[46.59%]">
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
              class="w-[424px] gap-[30px] font-inter pt-6 flex flex-col items-start"
            >
              <div class="font-[500] w-full text-left">
                <div
                  class="w-full gap-2 flex flex-col items-start self-stretch"
                >
                  <div
                    class="h-[17px] text-[#425466] w-full flex items-center justify-center"
                  >
                    <p class="w-[424px] h-[17px] text-sm">
                      Informe seu CPF:
                    </p>
                  </div>
                  <div>
                    <input type="text" name="cpf" placeholder="CPF" class="h-[46px] bg-[#EDF2F7] pt-[15px] pb-[17px] pr-[289px] text-[#7A828A] w-full pl-4 rounded-md">
                  </div>
                </div>
              </div>
              <div class="w-full">
                <div
                  class="w-full gap-2 flex flex-col items-start self-stretch"
                >
                  <div
                    class="h-[17px] text-[#425466] font-[500] w-full flex items-center justify-center text-left"
                  >
                    <p class="w-[424px] h-[17px] text-sm">Informe sua Senha:</p>
                  </div>
                  <div>
                    <input type="password" name="password" placeholder="Senha" class="h-[46px] bg-[#EDF2F7] pt-[15px] pb-[17px] pr-[274px] text-[#7A828A] font-[500] w-full pl-4 rounded-md text-left"                  >
                  </div>
                </div>
              </div>
            </div>
            <div>
              <button type="submit" class="w-[424px] bg-[#141416] rounded-[90px] font-dm_sans text-[#FCFCFD] font-[700] gap-3 flex justify-center items-center text-center py-4 px-6">Entrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  </body>
</html>