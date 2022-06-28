<!DOCTYPE html>
<html lang="pt">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Aeroclube</title>
   <link rel="stylesheet" href="css.css">
   <link rel="stylesheet" href="texto.css">
</head>
 
<body>
     <center><h1 class="move" font size="10"> AEROCLUBE</h1> </center>
   <form method="post" name="dados" action="crud.php?acao=inserir" onSubmit="return enviardados();">
           
      <table width="800" border="0" align="center">
         <tr>
            <td height="22"></td>
            <td>
                <div class="container-btn">
                <input class="btn verde" name="Submit" type="submit" formaction='cadastraraluno.php'  value="Cadastrar aluno">
                <input class="btn vermelho" name="Submit" type="submit" formaction='cadastraraula.php'  value="Cadastrar Aula">
                <input class="btn blue"  name="Submit" type="submit" formaction='cadastraraeroclube.php'  value="Cadastar Aeroclube">
                </div>
              </button>
            </td>
         </tr>
      </table>
   </form>
</body>
</html>