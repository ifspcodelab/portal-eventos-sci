<?php
include 'head.php';
?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<header>
			<img src="imagens/LogoIF.png" alt="logo">
			<h1>Eventos - IFSP </h1>
			<div id="contato">
		
					<img src="imagens/logoinstagram.png" alt="Instagramlogo">
					<a href="#instagram">Instagram</a>
			</div>
			<hr>
			
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
                <article id='article-info'>
                    <?php
                    $sql="SELECT * FROM `eventos_atividades_noticias` order by data_noticia desc limit 2";
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
    
                    ?>
                </article>
				<button class="button" id="carregar">Mostrar Mais</button>
            </section>
        <main>
		<script>
    $(document).ready(function(){
		var cont=2;
        $("#carregar").click(()=>{
			cont+=1;
			$("#article-info").load("carregar2.php",{
				newc:cont
			});
		});		
		})  
</script>
