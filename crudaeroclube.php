<?php

include_once "conexao.php";

$acao = $_GET['acao'];

if(isset($_GET['id']))

{
    $id = $_GET['id'];
}

switch ($acao){
    case 'inserir':
        
    $nomeaeroclube = $_POST['nomeaeroclube'];
    $endereco = $_POST['endereco'];
    $cnpj = $_POST['cnpj'];
    

    $sqlInsert = "INSERT INTO aeroclube (nomeaeroclube, endereco, cnpj) 
    VALUES ('$nomeaeroclube',  '$endereco', '$cnpj')";
    
    if(!mysqli_query($conexao,$sqlInsert))
    {
        die("erro ao inserir informações" . mysqli_error($conexao));
    }
    else
    {
        echo "<script language='javascript' type='text/javascript'>
        alert('dados cadastrados com sucesso!')
        window.location.href='crudaeroclube.php?acao=selecionar'</script>";
    }

        break;
        
    case 'montar':

        $id = $_GET['id'];
        $sql = 'SELECT idaeroclube , nomeaeroclube , endereco , cnpj  FROM aeroclube WHERE idaeroclube =' .$id;
        $resultado = mysqli_query($conexao,$sql) or die ("Erro ao Editar Registros");

      
        echo "<Form method = 'post' name = 'dados' action='crudaeroclube.php?acao=atualizar' onSubmit='return Enviardados();'>";
        echo "<table width='588' border ='0' align = 'center'>";
        

        while ($registro = mysqli_fetch_array($resultado)){
            echo "<tr>";
            echo "<td width='118'><font size ='1' face='Verdana,Arial,Helvetica,sans-serif'>Código:</font></td>";
            echo "<td width='460'>";
            echo "<input name='idaeroclube' type='text' class='formbutton' id='idaeroclube' size='5'  maxlength='10' value=" .$id." readonly>";
            echo "</td>";
            echo "</tr>";

            echo " <tr>";
            echo " <td> <font face ='Verdana, Arial, Helvetica , sans-serif'><font size='1'> Nome Aeroclube: <strong>:</strong></font></td>";
            echo " <td rowspan='2'> <font size='2'>";
            echo "<style> textarea{resize:none;}></style>";
            echo "<textarea name='nomeaeroclube' cols='50' rows='3' class='formbutton'>" .htmlspecialchars ($registro['nomeaeroclube']) . "</textarea>";
            echo "</font></td>";
            echo "</tr>";
            echo "<tr>";

            

            echo " <tr>";
            echo " <td> <font face ='Verdana, Arial, Helvetica , sans-serif'><font size='1'> Endereco: <strong>:</strong></font></td>";
            echo " <td rowspan='2'> <font size='2'>";
            echo "<style> textarea{resize:none;}></style>";
            echo "<textarea name='endereco' cols='50' rows='3' class='formbutton'>" .htmlspecialchars ($registro['endereco']) . "</textarea>";
            echo "</font></td>";
            echo "</tr>";
            echo "<tr>";

            echo " <tr>";
            echo " <td> <font face ='Verdana, Arial, Helvetica , sans-serif'><font size='1'> CNPJ: <strong>:</strong></font></td>";
            echo " <td rowspan='2'> <font size='2'>";
            echo "<style> textarea{resize:none;}></style>";
            echo "<textarea name='cnpj' cols='50' rows='3' class='formbutton'>" .htmlspecialchars ($registro['cnpj']) . "</textarea>";
            echo "</font></td>";
            echo "</tr>";
            echo "<tr>";
            
            
            
            echo "<tr>";
            echo "<td height = '22'></td>";
            echo "<td>";
            echo "<input type= 'submit' class='formobjects'  value='Atualizar'>";
            echo "<button type='submit' formaction = 'crudaeroclube.php?acao=selecionar'>Selecionar</button> ";
            echo "<input type= 'reset' name='reset' class='formobjects'  value='Limpar Campos'>";
            echo "</td>";
            echo "</tr>";

            echo"</table>";
            echo"</form>";
        }
        mysqli_close($conexao);
           
             
                
           
        break;
        
    case'atualizar':
        
        case'atualizar':
        
        $codigo = $_POST['idaeroclube'];
        $nomeaeroclube = $_POST['nomeaeroclube'];
        $endereco = $_POST['endereco'];
        $cnpj = $_POST['cnpj'];

        $sql = "UPDATE aeroclube SET nomeaeroclube ='$nomeaeroclube'  , endereco =' $endereco', cnpj = '  $cnpj' WHERE idaeroclube = '$codigo' ";

        if(!mysqli_query($conexao,$sql)){
            die('</br> Erro no comando SQL UPDATE: ' . mysqli_error($conexao));
            echo "<script language = 'javascript' type ='text/javascript'>
            alert('Erro ao Atualizar');Windows.Location = 'crudaeroclube.php?acao=selecionar'</script>";
        }
        else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados atualizado com sucesso!')
            window.location.href='crudaeroclube.php?acao=selecionar'</script>";
        }
        
        break;
        
    case 'deletar':
        
        $sql = "DELETE FROM aeroclube WHERE idaeroclube = '" . $id . "'";
        
        if(!mysqli_query($conexao,$sql))
    {
        die("erro ao inserir informações" . mysqli_error($conexao));
    }
        else
    {
        echo "<script language='javascript' type='text/javascript'>
        alert('dados deletados com sucesso!')
        window.location.href='crudaeroclube.php?acao=selecionar'</script>";
    }
    mysqli_close($conexao);
    header("Location:crudaeroclube.php?acao=selecionar");
        
    case 'selecionar':
        
        date_default_timezone_set('America/Sao_Paulo');
      
        
        echo"<meta charset='UTF-8'>";
        echo"<center><table border=1>";
        echo"<tr>";
        echo"<th>CODIGO</th>";
        echo"<th>NOME AEROCLUBE</th>";
        echo"<th>ENDEREÇO</th>";
        echo"<th>CNPJ</th>";
        echo"<th>AÇÃO</th>";
        echo"</tr>";
        
        $sqlInsert = "SELECT * FROM aeroclube";
        $resultado = mysqli_query($conexao,$sqlInsert) or die("Erro ao retornar dados");
        
        echo"<center>Registro cadastrados na base de dados.<br/></center>";
        echo"</br>";
        
        while($registro = mysqli_fetch_array($resultado)){
            
            $id = $registro['idaeroclube'];
            $nomeaeroclube = $registro['nomeaeroclube'];
            $endereco = $registro['endereco'];
            $cnpj = $registro['cnpj'];
            
            echo"<tr>";
            echo"<td>" . $id . "</td>";
            echo"<td>" . $nomeaeroclube . "</td>";
            echo"<td>" . $endereco . "</td>";
            echo"<td>" . $cnpj . "</td>";


            echo"<td> <a href='crudaeroclube.php?acao=deletar&id=$id'><img src='delete.png' alt='Deletar registro'></a>
            <a href='crudaeroclube.php?acao=montar&id=$id'><img src='update.png' alt='Atualizar' title='atualizar registro'</a>
            <a href='index.php'><img src='insert.png' alt='Inseir' title='Inserir registro'></a>";
            
            echo"</tr>";
        }
        mysqli_close($conexao);


        break;
    
    default:
        header("Location:crudaeroclube.php?acao=selecionar");
        break;
}


