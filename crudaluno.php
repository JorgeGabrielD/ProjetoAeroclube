<?php

include_once "conexao.php";

$acao = $_GET['acao'];

if(isset($_GET['id']))

{
    $id = $_GET['id'];
}

switch ($acao){
    case 'inserir':
        
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $endereco = $_POST['endereco'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];

    $sqlInsert = "INSERT INTO aluno (nome, idade, endereco, rg, cpf) 
    VALUES ('$nome', '$idade', '$endereco', '$rg' , '$cpf')";
    
    if(!mysqli_query($conexao,$sqlInsert))
    {
        die("erro ao inserir informações" . mysqli_error($conexao));
    }
    else
    {
        echo "<script language='javascript' type='text/javascript'>
        alert('dados cadastrados com sucesso!')
        window.location.href='crudaluno.php?acao=selecionar'</script>";
    }

        break;
        
    case 'montar':

        $id = $_GET['id'];
        $sql = 'SELECT idaluno , nome , idade , endereco , rg , cpf  FROM aluno WHERE idaluno =' .$id;
        $resultado = mysqli_query($conexao,$sql) or die ("Erro ao Editar Registros");

      
        echo "<Form method = 'post' name = 'dados' action='crudaluno.php?acao=atualizar' onSubmit='return Enviardados();'>";
        echo "<table width='588' border ='0' align = 'center'>";

        while ($registro = mysqli_fetch_array($resultado)){
            echo "<tr>";
            echo "<td width='118'><font size ='1' face='Verdana,Arial,Helvetica,sans-serif'>Código:</font></td>";
            echo "<td width='460'>";
            echo "<input name='id' type='text' class='formbutton' id='id' size='5'  maxlength='10' value=" .$id." readonly>";
            echo "</td>";
            echo "</tr>";

            echo " <tr>";
            echo " <td> <font face ='Verdana, Arial, Helvetica , sans-serif'><font size='1'> Nome: <strong>:</strong></font></td>";
            echo " <td rowspan='2'> <font size='2'>";
            echo "<style> textarea{resize:none;}></style>";
            echo "<textarea name='nome' cols='50' rows='3' class='formbutton'>" .htmlspecialchars ($registro['nome']) . "</textarea>";
            echo "</font></td>";
            echo "</tr>";
            echo "<tr>";

            echo " <tr>";
            echo " <td> <font face ='Verdana, Arial, Helvetica , sans-serif'><font size='1'> Idade: <strong>:</strong></font></td>";
            echo " <td rowspan='2'> <font size='2'>";
            echo "<style> textarea{resize:none;}></style>";
            echo "<textarea name='idade' cols='50' rows='3' class='formbutton'>" .htmlspecialchars ($registro['idade']) . "</textarea>";
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
            echo " <td> <font face ='Verdana, Arial, Helvetica , sans-serif'><font size='1'> RG: <strong>:</strong></font></td>";
            echo " <td rowspan='2'> <font size='2'>";
            echo "<style> textarea{resize:none;}></style>";
            echo "<textarea name='rg' cols='50' rows='3' class='formbutton'>" .htmlspecialchars ($registro['rg']) . "</textarea>";
            echo "</font></td>";
            echo "</tr>";
            echo "<tr>";
            
              echo " <tr>";
            echo " <td> <font face ='Verdana, Arial, Helvetica , sans-serif'><font size='1'> CPF: <strong>:</strong></font></td>";
            echo " <td rowspan='2'> <font size='2'>";
            echo "<style> textarea{resize:none;}></style>";
            echo "<textarea name='cpf' cols='50' rows='3' class='formbutton'>" .htmlspecialchars ($registro['cpf']) . "</textarea>";
            echo "</font></td>";
            echo "</tr>";
            echo "<tr>";
            
            
            echo "<tr>";
            echo "<td height = '22'></td>";
            echo "<td>";
            echo "<input type= 'submit' class='formobjects'  value='Atualizar'>";
            echo "<button type='submit' formaction = 'crudaluno.php?acao=selecionar'>Selecionar</button> ";
            echo "<input type= 'reset' name='reset' class='formobjects'  value='Limpar Campos'>";
            echo "</td>";
            echo "</tr>";

            echo"</table>";
            echo"</form>";
        }
        mysqli_close($conexao);
           
             
                
           
        break;
        
    case'atualizar':
        
        $codigo = $_POST['id'];
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $endereco = $_POST['endereco'];
        $rg = $_POST['rg'];
        $cpf = $_POST['cpf'];

        $sql = "UPDATE aluno SET nome ='$nome' , idade = '$idade ' , endereco =' $endereco', rg = '  $rg', cpf = '$cpf'  WHERE idaluno = '$codigo' ";

        if(!mysqli_query($conexao,$sql)){
            die('</br> Erro no comando SQL UPDATE: ' . mysqli_error($conexao));
            echo "<script language = 'javascript' type ='text/javascript'>
            alert('Erro ao Atualizar');Windows.Location = 'crudaluno.php?acao=selecionar'</script>";
        }
        else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados atualizado com sucesso!')
            window.location.href='crudaluno.php?acao=selecionar'</script>";
        }
        
        break;
        
    case 'deletar':
        
        $sql = "DELETE FROM aluno WHERE idaluno = '" . $id . "'";
        
        if(!mysqli_query($conexao,$sql))
    {
        die("erro ao inserir informações" . mysqli_error($conexao));
    }
        else
    {
        echo "<script language='javascript' type='text/javascript'>
        alert('dados deletados com sucesso!')
        window.location.href='crudaluno.php?acao=selecionar'</script>";
    }
    mysqli_close($conexao);
    header("Location:crudaluno.php?acao=selecionar");
        
        
        break;
        
    case 'selecionar':
        
        date_default_timezone_set('America/Sao_Paulo');
      
        
        echo"<meta charset='UTF-8'>";
        echo"<center><table border=1>";
        echo"<tr>";
        echo"<th>CODIGO</th>";
        echo"<th>NOME</th>";
        echo"<th>IDADE</th>";
        echo"<th>ENDEREÇO</th>";
        echo"<th>RG</th>";
        echo"<th>CPF</th>";
        echo"<th>AÇÃO</th>";
        echo"</tr>";
        
        $sqlInsert = "SELECT * FROM aluno";
        $resultado = mysqli_query($conexao,$sqlInsert) or die("Erro ao retornar dados");
        
        echo"<center>Registro cadastrados na base de dados.<br/></center>";
        echo"</br>";
        
        while($registro = mysqli_fetch_array($resultado)){
            
            $id = $registro['idaluno'];
            $nome = $registro['nome'];
            $idade = $registro['idade'];
            $endereco = $registro['endereco'];
            $rg = $registro['rg'];
            $cpf = $registro['cpf'];
            
            echo"<tr>";
            echo"<td>" . $id . "</td>";
            echo"<td>" . $nome . "</td>";
            echo"<td>" . $idade . "</td>";
             echo"<td>" . $endereco . "</td>";
            echo"<td>" . $rg . "</td>";
            echo"<td>" . $cpf . "</td>";

            echo"<td> <a href='crudaluno.php?acao=deletar&id=$id'><img src='delete.png' alt='Deletar registro'></a>
            <a href='crudaluno.php?acao=montar&id=$id'><img src='update.png' alt='Atualizar' title='atualizar registro'</a>
            <a href='index.php'><img src='insert.png' alt='Inseir' title='Inserir registro'></a>";
            
            echo"</tr>";
        }
        mysqli_close($conexao);


        break;
    
    default:
        header("Location:crudaluno.php?acao=selecionar");
        break;
}


