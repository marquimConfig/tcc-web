  <!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>RS Requerimentos</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Cadastrar</a></li>
        <li class="tab"><a href="#login">Entrar</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1> Cadastro Aluno </h1>
          
          <form action="enviar.php" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                Nome <span class="req">*</span>
              </label>
              <input name="nome" type="text" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                CPF: Apenas Numeros <span class="req">*</span>
              </label>
              <input name="cpf" type="text"required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
               Email <span class="req">*</span>
            </label>
            <input name="email" type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Endereço <span class="req">*</span>
            </label>
            <input name="endereco" type="text"required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Curso <span class="req">*</span>
            </label>
            <input name="curso" type="text"required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Telefone <span class="req">*</span>
            </label>
            <input name="telefone" type="text"required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Senha <span class="req">*</span>
            </label>
            <input name="senha" type="password"required autocomplete="off"/>
          </div>
          
          <button type="submit" name="enviar" class="button button-block"/>Enviar!!</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Bem Vindo !</h1>
          
          <form action="enviar.php" method="post">
          
            <div class="field-wrap">
            <label>
              Email <span class="req">*</span>
            </label>
            <input name="email" type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Senha <span class="req">*</span>
            </label>
            <input name="senha" type="password"required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Esqueceu a Senha?</a></p>
          
          <button name="login" class="button button-block"/>Entrar !!</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
