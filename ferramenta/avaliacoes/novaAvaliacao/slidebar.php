<?php $tipoUsuario = 'administrador';?>

<aside class="main-sidebar">/
    <section class="sidebar">
      
      
      <ul class="sidebar-menu" data-widget="tree">
            <?php 
                if(strcmp($_SERVER['PHP_SELF'], "/ferramenta/index.php") == 0){
                ?>
                    <li class="active">
                        <a href="../../index.php">
                            <i class="fa fa-home"></i> <span>Início</span>
                        </a>
                    </li>
            <?php
                } else{
                    ?>
                    <li>
                        <a href="../../index.php">
                            <i class="fa fa-home"></i> <span>Início</span>
                        </a>
                    </li>
            <?php
                }
            ?>
            
            <?php 
                if(strcmp($_SERVER['PHP_SELF'], "/ferramenta/editarPerfil.php") == 0){
                ?>
                    <li class="active">
                        <a href="../../editarPerfil.php">
                            <i class="fa fa-edit"></i> <span>Editar perfil</span>
                        </a>
                    </li>
            <?php
                } else{
                    ?>
                    <li>
                        <a href="../../editarPerfil.php">
                            <i class="fa fa-edit"></i> <span>Editar perfil</span>
                        </a>
                    </li>
            <?php
                }
            ?>
        <li class="header">AVALIAÇÕES</li>
        
        <?php 
            if(strcmp($tipoUsuario,"administrador") == 0){
                if(strcmp($_SERVER['PHP_SELF'], "/ferramenta/avaliacoes/novaAvaliacao/criarAvaliacao.php") == 0){
                ?>
                    <li class="active">
                        <a href="introetapa1.php">
                            <i class="fa fa-plus"></i> <span>Criar uma nova avaliação</span>
                        </a>
                    </li>
            <?php
                } else{
                    ?>
                    <li>
                        <a href="introetapa1.php">
                            <i class="fa fa-plus"></i> <span>Criar uma nova avaliação</span>
                        </a>
                    </li>
            <?php
                }
            }
            ?>
        
        
        <?php 
                if(strcmp($_SERVER['PHP_SELF'], "/ferramenta/avaliacoes/avaliacoesAndamento.php") == 0){
                ?>
                    <li class="active">
                        <a href="../avaliacoesAndamento.php">
                            <i class="fa fa-spinner"></i> <span>Avaliações em andamento</span>
                        </a>
                    </li>
            <?php
                } else{
                    ?>
                    <li>
                        <a href="../avaliacoesAndamento.php">
                            <i class="fa fa-spinner"></i> <span>Avaliações em andamento</span>
                        </a>
                    </li>
            <?php
                }
            ?>
        
            <?php 
                if(strcmp($_SERVER['PHP_SELF'], "/ferramenta/avaliacoes/avaliacoesConcluidas.php") == 0){
                ?>
                    <li class="active">
                        <a href="../avaliacoesConcluidas.php">
                            <i class="fa fa-check"></i> <span>Avaliações concluídas</span>
                        </a>
                    </li>
            <?php
                } else{
                    ?>
                    <li>
                        <a href="../avaliacoesConcluidas.php">
                            <i class="fa fa-check"></i> <span>Avaliações concluídas</span>
                        </a>
                    </li>
            <?php
                }
            ?>
        
        <?php
        if($_SESSION['isAdmin'] == 1){
        ?>
        <li class="header">USUÁRIOS</li>
        <?php 
                if(strcmp($_SERVER['PHP_SELF'], "/ferramenta/administracao/cadastrarUsuario.php") == 0){
                ?>
                    <li class="active">
                        <a href="../../administracao/cadastrarUsuario.php">
                            <i class="fa fa-user-plus"></i> <span>Cadastrar usuário</span>
                        </a>
                    </li>
            <?php
                } else{
                    ?>
                    <li>
                        <a href="../../administracao/cadastrarUsuario.php">
                            <i class="fa fa-user-plus"></i> <span>Cadastrar usuário</span>
                        </a>
                    </li>
            <?php
                }
            ?>
                    
        <?php 
                if(strcmp($_SERVER['PHP_SELF'], "/ferramenta/administracao/gerenciarUsuarios.php") == 0){
                ?>
                    <li class="active">
                        <a href="../../administracao/gerenciarUsuarios.php">
                            <i class="fa fa-users"></i> <span>Gerenciar usuários</span>
                        </a>
                    </li>
            <?php
                } else{
                    ?>
                    <li>
                        <a href="../../administracao/gerenciarUsuarios.php">
                            <i class="fa fa-users"></i> <span>Gerenciar usuários</span>
                        </a>
                    </li>
            <?php
                }
        }
            ?>
      </ul>
    </section>
  </aside>