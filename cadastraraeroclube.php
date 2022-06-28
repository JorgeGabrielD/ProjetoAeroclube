<!DOCTYPE html>
<html lang="pt">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cadastro Aeroclube</title>
   <link rel="stylesheet" href="botao.css">
</head>
 
<body>
    <div class="container-btn">
   <form method="post" name="dados" action="crudaeroclube.php?acao=inserir" onSubmit="return enviardados();">

      <table width="588" border="0" align="center">
         <tr>
            <td width="118">
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome Aeroclube:</font>
            </td>
            <td width="460">
               <input name="nomeaeroclube" type="text" class="formbutton" id="nomeaeroclube" size="52" maxlength="150">
            </td>
         </tr>

       <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Endereço :</font>
            </td>
            <td>
               <font size="2">
                  <input name="endereco" type="text" id="endereco" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">CNPJ :</font>
            </td>
            <td>
               <font size="2">
                  <input name="cnpj" type="text" id="cnpj" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>
         

         
       
         <tr>
            <td height="22"></td>
            <td>
                <input class="btn verde" name="Submit" type="submit" class="formobjects" value="Cadastrar">
                <input class="btn vermelho" name="Reset" type="reset" class="formobjects" value="Limpar campos">
                <input class="btn blue" name="Submit" type="submit" formaction='crudaeroclube.php?acao=selecionar'  value="Aeroclubes Registrados">
                </div>
              </button>
            </td>
         </tr>
      </table>
   </form>
</body>

</html>