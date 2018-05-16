<?php include'bd.php' ?>
		<?php
			

			if (isset($_POST['enviar'])) {
				$nome = $_POST['nome'];
				$cpf = $_POST['cpf'];
				$endereco = $_POST['endereco'];
				$email = $_POST['email'];
				$senha = $_POST['senha'];
				$curso = $_POST['curso'];
				$telefone = $_POST['telefone'];

				$inserir = mysql_query("insert into aluno(nome,cpf,endereco,email,senha,curso,telefone) values('$nome','$cpf','$endereco','$email','$senha','$curso','$telefone')") or die (mysql_error());
				if ($inserir == 0) 
				{
					echo "<div>Erro ao cadastrar!</div>";
				}
				else
				{
					header("Location: /index.php");
					echo "<script></script>";
				}
			}
			if (isset($_POST['login'])) {
				$email = $_POST['email'];
				$senha = $_POST['senha'];
				$sql = mysql_query("select * from aluno where email = '$email' and senha = '$senha'") or die(mysql_error());
				$row = mysql_num_rows($sql);
				if ($row > 0) {
					$_SESSION['email'] = $_POST['email'];
					$_SESSION['senha'] = $_POST['senha'];
					header("Location: /aluno.php");
					echo "<script>loginsuccessfully</script>";
				}
			}



			if (isset($_POST['up'])) {
			$data = date('Y-m-d');
			$tipo = $_POST['tipo'];
			$descricao = $_POST['descricao'];
			$imagem = $_FILES['thumb'];
			$extencoes_aceitas = array('jpg','png','gif','pjpeg','jpeg');
    		$extencao_capa = strtolower(end(explode(".", $imagem['name'])));
			$capa_name = "RS_".date('dmY')."_".md5(uniqid(rand(), true)).".jpg";
			
			// requisição para a função do upload juntamente com o redimensionamento //
			function upload($tmp, $name, $largura, $pasta){
		    $img = imagecreatefromjpeg($tmp);
			$x = imagesx($img);
			$y = imagesy($img);
			$altura = ($largura*$y) / $x;
			$nova = imagecreatetruecolor($largura, $altura);
			imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
			imagejpeg($nova, "$pasta/$name");
		    imagedestroy($img);
			imagedestroy($nova);
			return($name);
			}
		
			// enviando imagem para a pasta e redimensionando //
			upload($imagem['tmp_name'], $capa_name, 1000, 'uploads/requerimentos');



			$inserir = mysql_query("INSERT INTO requerimentos(tipo, data, descricao, anexo) VALUES ('$tipo','$data','$descricao','$capa_name')") or die(mysql_error());
			//RECEBE ULTIMO ID
			$ultimo_id_n = mysql_insert_id($cn); 





				if ($inserir == 0) 
				{
					echo "<div>Erro ao cadastrar!</div>";
				}
				else
				{
					echo('requerimento inserido com sucesso! <br/> Você será redirecionado em instantes!');
					header("Refresh: 2, aluno.php");
				}

			$id_not = mysql_insert_id();
		 $pasta = 'uploads/requerimentos/';
		 foreach($_FILES["imagem"]["error"] as $key => $error){

		 if($error == UPLOAD_ERR_OK){
		 $tmp_name = $_FILES["imagem"]["tmp_name"][$key];
		 $cod = "RS_".date('dmY')."_".md5(uniqid(rand(), true)).".jpg";
		 //date('dmy') . '-' . $_FILES["imagem"]["name"][$key];
		 $nome = $_FILES["imagem"]["name"][$key];
		 $uploadfile = $pasta . basename($cod);
		 
		 if(move_uploaded_file($tmp_name, $uploadfile)){
		 $inse = mysql_query("INSERT INTO req_img (id_req, img_nome) VALUES ('$id_not', '$cod')");
		 }
		 }
		 }			
}    

       
		?>