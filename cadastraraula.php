<!DOCTYPE html>
<html lang="pt">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cadastro Aluno</title>
   <link rel="stylesheet" href="botao.css">
</head>
 
<body>
    <div class="container-btn">
   <form method="post" name="dados" action="crudaula.php?acao=inserir" onSubmit="return enviardados();">

      <table width="588" border="0" align="center">
         <tr>
            <td width="118">
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome Instrutor :</font>
            </td>
            <td width="460">
               <input name="nomeinstrutor" type="text" class="formbutton" id="nomeinstrutor" size="52" maxlength="150">
            </td>
         </tr>

       <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome Matéria :</font>
            </td>
            <td>
               <font size="2">
                  <input name="nomemateria" type="text" id="nomemateria" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Hora da chegada :</font>
            </td>
            <td>
               <font size="2">
                  <input name="horachegada" type="text" id="horachegada" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>
         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Hora saída :</font>
            </td>
            <td>
               <font size="2">
                  <input name="horasaida" type="text" id="horasaida" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>
         <tr>
            <td height="22"></td>
            <td>
                <input class="btn verde" name="Submit" type="submit" class="formobjects" value="Cadastrar">
                <input class="btn vermelho" name="Reset" type="reset" class="formobjects" value="Limpar campos">
                <input class="btn blue"name="Submit" type="submit" formaction='crudaula.php?acao=selecionar'  value="Aulas Cadastradas">
                </div>
              </button>
            </td>
         </tr>
      </table>
   </form>
</body>

</html>