<?php

include_once "conexao.php";

$acao = $_GET['acao'];

if(isset($_GET['id']))

{
    $id = $_GET['id'];
}

switch ($acao){
    case 'inserir':
        
    $nomeinstrutor = $_POST['nomeinstrutor'];
    $nomemateria = $_POST['nomemateria'];
    $horachegada = $_POST['horachegada'];
    $horasaida = $_POST['horasaida'];
    

    $sqlInsert = "INSERT INTO aula (nomeinstrutor, nomemateria, horachegada, horasaida) 
    VALUES ('$nomeinstrutor', '$nomemateria', '$horachegada', '$horasaida')";
    
    if(!mysqli_query($conexao,$sqlInsert))
    {
        die("erro ao inserir informações" . mysqli_error($conexao));
    }
    else
    {
        echo "<script language='javascript' type='text/javascript'>
        alert('dados cadastrados com sucesso!')
        window.location.href='crudaula.php?acao=selecionar'</script>";
    }

        break;
        
    case 'montar':

        $id = $_GET['id'];
        $sql = 'SELECT idaula , nomeinstrutor , nomemateria , horachegada , horasaida  FROM aula WHERE idaula =' .$id;
        $resultado = mysqli_query($conexao,$sql) or die ("Erro ao Editar Registros");

      
        echo "<Form method = 'post' name = 'dados' action='crudaula.php?acao=atualizar' onSubmit='return Enviardados();'>";
        echo "<table width='588' border ='0' align = 'center'>";

        while ($registro = mysqli_fetch_array($resultado)){
            echo "<tr>";
            echo "<td width='118'><font size ='1' face='Verdana,Arial,Helvetica,sans-serif'>Código:</font></td>";
            echo "<td width='460'>";
            echo "<input name='idaula' type='text' class='formbutton' id='id' size='5'  maxlength='10' value=" .$id." readonly>";
            echo "</td>";
            echo "</tr>";

            echo " <tr>";
            echo " <td> <font face ='Verdana, Arial, Helvetica , sans-serif'><font size='1'> Nome Instrutor: <strong>:</strong></font></td>";
            echo " <td rowspan='2'> <font size='2'>";
            echo "<style> textarea{resize:none;}></style>";
            echo "<textarea name='nomeinstrutor' cols='50' rows='3' class='formbutton'>" .htmlspecialchars ($registro['nomeinstrutor']) . "</textarea>";
            echo "</font></td>";
            echo "</tr>";
            echo "<tr>";

            echo " <tr>";
            echo " <td> <font face ='Verdana, Arial, Helvetica , sans-serif'><font size='1'> Nome Materia: <strong>:</strong></font></td>";
            echo " <td rowspan='2'> <font size='2'>";
            echo "<style> textarea{resize:none;}></style>";
            echo "<textarea name='nomemateria' cols='50' rows='3' class='formbutton'>" .htmlspecialchars ($registro['nomemateria']) . "</textarea>";
            echo "</font></td>";
            echo "</tr>";
            echo "<tr>";

            echo " <tr>";
            echo " <td> <font face ='Verdana, Arial, Helvetica , sans-serif'><font size='1'> Hora chegada: <strong>:</strong></font></td>";
            echo " <td rowspan='2'> <font size='2'>";
            echo "<style> textarea{resize:none;}></style>";
            echo "<textarea name='horachegada' cols='50' rows='3' class='formbutton'>" .htmlspecialchars ($registro['horachegada']) . "</textarea>";
            echo "</font></td>";
            echo "</tr>";
            echo "<tr>";

            echo " <tr>";
            echo " <td> <font face ='Verdana, Arial, Helvetica , sans-serif'><font size='1'> Hora saida : <strong>:</strong></font></td>";
            echo " <td rowspan='2'> <font size='2'>";
            echo "<style> textarea{resize:none;}></style>";
            echo "<textarea name='horasaida' cols='50' rows='3' class='formbutton'>" .htmlspecialchars ($registro['horasaida']) . "</textarea>";
            echo "</font></td>";
            echo "</tr>";
            echo "<tr>";
            
            echo "<tr>";
            echo "<td height = '22'></td>";
            echo "<td>";
            echo "<input type= 'submit' class='formobjects'  value='Atualizar'>";
            echo "<button type='submit' formaction = 'crudaula.php?acao=selecionar'>Selecionar</button> ";
            echo "<input type= 'reset' name='reset' class='formobjects'  value='Limpar Campos'>";
            echo "</td>";
            echo "</tr>";

            echo"</table>";
            echo"</form>";
        }
        mysqli_close($conexao);
           
             
                
           
        break;
        
    case'atualizar':
        
        $codigo = $_POST['idaula'];
        $nomeinstrutor = $_POST['nomeinstrutor'];
        $nomemateria = $_POST['nomemateria'];
        $horachegada = $_POST['horachegada'];
        $horasaida = $_POST['horasaida'];
        

        $sql = "UPDATE aula SET nomeinstrutor ='$nomeinstrutor' , nomemateria = '$nomemateria ' , horachegada =' $horachegada', horasaida = '  $horasaida' WHERE idaula = '$codigo' ";

        if(!mysqli_query($conexao,$sql)){
            die('</br> Erro no comando SQL UPDATE: ' . mysqli_error($conexao));
            echo "<script language = 'javascript' type ='text/javascript'>
            alert('Erro ao Atualizar');Windows.Location = 'crudaula.php?acao=selecionar'</script>";
        }
        else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados atualizado com sucesso!')
            window.location.href='crudaula.php?acao=selecionar'</script>";
        }
        
        break;
        
    case 'deletar':
        
        $sql = "DELETE FROM aula WHERE idaula = '" . $id . "'";
        
        if(!mysqli_query($conexao,$sql))
    {
        die("erro ao inserir informações" . mysqli_error($conexao));
    }
        else
    {
        echo "<script language='javascript' type='text/javascript'>
        alert('dados deletados com sucesso!')
        window.location.href='crudaula.php?acao=selecionar'</script>";
    }
    mysqli_close($conexao);
    header("Location:crudaula.php?acao=selecionar");
        
        
        break;
        
    case 'selecionar':
        
        date_default_timezone_set('America/Sao_Paulo');
      
        
        echo"<meta charset='UTF-8'>";
        echo"<center><table border=1>";
        echo"<tr>";
        echo"<th>CODIGO</th>";
        echo"<th>NOME INSTRUTOR</th>";
        echo"<th>NOME MATERIA</th>";
        echo"<th>HORA CHEGADA</th>";
        echo"<th>HORA SAÍDA</th>";
        echo"<th>AÇÃO</th>";
        echo"</tr>";
        
        $sqlInsert = "SELECT * FROM aula";
        $resultado = mysqli_query($conexao,$sqlInsert) or die("Erro ao retornar dados");
        
        echo"<center>Registro cadastrados na base de dados.<br/></center>";
        echo"</br>";
        
        while($registro = mysqli_fetch_array($resultado)){
            
            $id = $registro['idaula'];
            $nomeinstrutor = $registro['nomeinstrutor'];
            $nomemateria = $registro['nomemateria'];
            $horachegada = $registro['horachegada'];
            $horasaida = $registro['horasaida'];
            
            echo"<tr>";
            echo"<td>" . $id . "</td>";
            echo"<td>" . $nomeinstrutor . "</td>";
            echo"<td>" . $nomemateria . "</td>";
             echo"<td>" . $horachegada . "</td>";
            echo"<td>" . $horasaida . "</td>";
            

            echo"<td> <a href='crudaula.php?acao=deletar&id=$id'><img src='delete.png' alt='Deletar registro'></a>
            <a href='crudaula.php?acao=montar&id=$id'><img src='update.png' alt='Atualizar' title='atualizar registro'</a>
            <a href='index.php'><img src='insert.png' alt='Inseir' title='Inserir registro'></a>";
            
            echo"</tr>";
        }
        mysqli_close($conexao);


        break;
    
    default:
        header("Location:crudaula.php?acao=selecionar");
        break;
}


