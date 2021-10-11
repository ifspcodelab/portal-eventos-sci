<?php
include 'head.php';
?>
<!-- pesquisa das noticias -->
<header>
            <a href="testpage1.php">
                <img src="imagens/LogoIF.png" alt="logo">
            </a>
			<h1>Eventos - IFSP </h1>
			<div id="contato">
				<ul>
					<li><img src="imagens/logoinstagram.png" alt="Instagramlogo"></li>	
					<li><a href="#instagram">Instagram</a></li>
				</ul>
			</div>
			<hr>
			<!-- <a href="#nav">Menu</a> -->
			
		</header>

		<nav id="funcoes">
         	<ul>
                <li><a href="testpage1.php"><button class="button">Eventos</button></a></li>
				<li><button class="button">Noticias</button></li>
				<li><a href="testpage3.php"><button class="button">Sobre eventos SCI</button></a></li>
				<!-- <li><a href="#contato">Contato</a></li> -->
         	</ul>
	  	</nav>
	  
	 
		<main>
			<nav id="barra-de-pesquisa">
				<form action="busca2.php" method="POST">
				<button id="Psqbutton" name="botao">Buscar</button>
				<input type="text" id="barrapesq" name="pesquisa" placeholder="digite aqui o evento que deseja pesquisar">
				</form>
            </nav>
            <section>
                <article>
                <?php
                $search=$_POST['pesquisa'];
                $sql="select * from eventos_atividades_noticias where titulo like '%$search%' or descricao_noticia like '%$search%' or data_noticia like '%$search%' or periodo_noticia like '%$search%'";
                    $result=$conn->query($sql);

                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            $datatime=strtotime($row['data_noticia']);
                            $dataformatada=date('d/m/y',$datatime);
                            echo"<div id='artigoloading'>
                            <a href='artigo2.php?tittle=".$row['titulo']."'>
                            <img src=data:image/jpeg;base64,".base64_encode($row['img'])."  alt='Logo'> 
                            <div class='texto'>
                            <h2>".$row['titulo']."</h2>
                            <p>".$row['descricao_noticia']."</p>
                            <h5>".$row["periodo_noticia"]."</h5>
                            <h5>".$dataformatada."</h5>
                            </div>
                            </a>
                            </div>
                            ";
                        }
                    }
                    else{
                        echo"Sem Resultados encontrados";
                    }
    
                    ?>
                </article>
            </section>
        <main>