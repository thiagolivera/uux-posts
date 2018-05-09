<?php

class ClassificacaoPRUsControle extends Banco{
    
    public function preparaClassTipo($classificacoes){
        $classTipo = new ClassificaoTipo();
        for($j=0; $j < count($classificacoes); $j++){
            if(strcmp($classificacoes[$j], "Crítica") == '0'){
                $classTipo->critica = TRUE;
            }
            if(strcmp($classificacoes[$j], "Elogio") == '0'){
                $classTipo->elogio = TRUE;
            }
            if(strcmp($classificacoes[$j], "Dúvida") == '0'){
                $classTipo->duvida = TRUE;
            }
            if(strcmp($classificacoes[$j], "Comparação") == '0'){
                $classTipo->comparacao = TRUE;
            }
            if(strcmp($classificacoes[$j], "Sugestão") == '0'){
                $classTipo->sugestao = TRUE;
            }
            if(strcmp($classificacoes[$j], "Ajuda") == '0'){
                $classTipo->ajuda = TRUE;
            }
        }
        
        return $classTipo;
    }
    
    public function preparaClassUsabilidade($classificacoes){
        $classUsabilidade = new ClassificaoUsabilidade();
        
        for($j=0; $j < count($classificacoes); $j++){
            if(strcmp($classificacoes[$j], "Eficácia") == '0'){
                $classUsabilidade->eficacia = TRUE;
            }
            if(strcmp($classificacoes[$j], "Eficiência") == '0'){
                $classUsabilidade->eficiencia = TRUE;
            }
            if(strcmp($classificacoes[$j], "Satisfação") == '0'){
                $classUsabilidade->satisfacao = TRUE;
            }
            if(strcmp($classificacoes[$j], "Segurança") == '0'){
                $classUsabilidade->seguranca = TRUE;
            }
            if(strcmp($classificacoes[$j], "Utilidade") == '0'){
                $classUsabilidade->utilidade = TRUE;
            }
            if(strcmp($classificacoes[$j], "Memorabilidade") == '0'){
                $classUsabilidade->memorabilidade = TRUE;
            }
            if(strcmp($classificacoes[$j], "Aprendizado") == '0'){
                $classUsabilidade->aprendizado = TRUE;
            }
        }
        
        return $classUsabilidade;
    }
    
    public function preparaClassUX($classificacoes){
        $classUX = new ClassificacaoUX();
        for($j=0; $j < count($classificacoes); $j++){
            if(strcmp($classificacoes[$j], "Afeto") == '0'){
                $classUX->afeto = TRUE;
            }
            if(strcmp($classificacoes[$j], "Estética") == '0'){
                $classUX->estetica = TRUE;
            }
            if(strcmp($classificacoes[$j], "Frustração") == '0'){
                $classUX->frustracao = TRUE;
            }
            if(strcmp($classificacoes[$j], "Satisfação") == '0'){
                $classUX->satisfacao = TRUE;
            }
            if(strcmp($classificacoes[$j], "Motivação") == '0'){
                $classUX->motivacao = TRUE;
            }
            if(strcmp($classificacoes[$j], "Suporte") == '0'){
                $classUX->suporte = TRUE;
            }
        }
        
        return $classUX;
    }
    
    public function salvarClassificacaoPRUs($classificacoes, $idAvaliacao){
        session_start();
        $idClassificador = $_SESSION["login"];
    
        $erro = 0;
        
        $conexao = mysqli_connect($this->getHost(), $this->getUser(), $this->getPass(), $this->getBanco());
        mysqli_autocommit($conexao, FALSE);
        
        for($i=0; $i < count($classificacoes); $i++){
        //Salvar registros por avaliação
            $idClassTipo = null;
            $idClassUsabilidade = null;
            $idClassUX = null;
            
            //Verifica se há classificação por tipo
            if(isset($classificacoes[$i][2][0])){
                //Prepara a classificação por tipo
                $classTipo = self::preparaClassTipo($classificacoes[$i][2]);

                //Salvar classificação por tipo
                $sql = "INSERT INTO `classTipo`(`idClassTipo`, `critica`, `elogio`, `duvida`, `comparacao`, `sugestao`, `ajuda`) VALUES ("
                    . "DEFAULT,'".$classTipo->critica."','".$classTipo->elogio."','".$classTipo->duvida."','".$classTipo->comparacao."','".$classTipo->sugestao."','".$classTipo->ajuda."');";
                if (!mysqli_query($conexao, $sql)){
                    $erro++; //se der erro incrementa no contador para cancelar a transação
                }
                
                //obtem o id da classTipo
                $sql = "SELECT idClassTipo FROM classTipo ORDER BY idClassTipo DESC LIMIT 1;";
                $idClassTipo = mysqli_fetch_array(mysqli_query($conexao, $sql))[0];
            }
            
            //Verifica se há classificação usabilidade
            if(isset($classificacoes[$i][5][0])){
                //Prepara a classificação por facetas usabilidade
                $classUsabilidade = self::preparaClassUsabilidade($classificacoes[$i][5]);
                
                //grava classificação por usabilidade
                $sql = "INSERT INTO `classUsabilidade`(`idClassUsabilidade`, `eficacia`, `eficiencia`, `satisfacao`, `seguranca`, `utilidade`, `memorabilidade`, `aprendizado`) VALUES ("
                        . "DEFAULT,'".$classUsabilidade->eficacia."','".$classUsabilidade->eficiencia."','".$classUsabilidade->satisfacao."','".$classUsabilidade->seguranca."','".$classUsabilidade->utilidade."','".$classUsabilidade->memorabilidade."','".$classUsabilidade->aprendizado."');";
                if (!mysqli_query($conexao, $sql)){
                    $erro++; //se der erro incrementa no contador para cancelar a transação
                }

                //obtem o id da classUsabilidade
                $sql = "SELECT idClassUsabilidade FROM classUsabilidade ORDER BY idClassUsabilidade DESC LIMIT 1;";
                $idClassUsabilidade = mysqli_fetch_array(mysqli_query($conexao, $sql))[0];
            }
            
            //Verifica se há classificação UX
            if(isset($classificacoes[$i][6][0])){
                //Prepara a classificação por facetas de UX
                $classUX = self::preparaClassUX($classificacoes[$i][6]);
                
                //gravar classificação por UX
                 $sql = "INSERT INTO `classUX`(`idClassUX`, `afeto`, `estetica`, `frustracao`, `satisfacao`, `motivacao`, `suporte`) VALUES ("
                        . "DEFAULT,'".$classUX->afeto."','".$classUX->estetica."','".$classUX->frustracao."','".$classUX->satisfacao."','".$classUX->motivacao."','".$classUX->suporte."');";
                if (!mysqli_query($conexao, $sql)){
                    $erro++; //se der erro incrementa no contador para cancelar a transação
                }
                //obtem o id da classUX
                $sql = "SELECT idClassUX FROM classUX ORDER BY idClassUX DESC LIMIT 1;";
                $idClassUX = mysqli_fetch_array(mysqli_query($conexao, $sql))[0];
            }
            
            //Grava classificação
            $sql = "INSERT INTO `classificacao`(`idClassificador`, `idPostagem`, `idAvaliacao`, `classPRU`, `classFuncionalidade`, `classTipo`, `classIntencao`, `classAnaliseSentimentos`, `classUsabilidade`, `classUX`, `classArtefato`) VALUES ("
                    . "'".$idClassificador."','".$classificacoes[$i][8]."','".$idAvaliacao."','".$classificacoes[$i][0]."','".$classificacoes[$i][1]."','".$idClassTipo."','".$classificacoes[$i][3]."','".$classificacoes[$i][4]."','".$idClassUsabilidade."','".$idClassUX."','".$classificacoes[$i][7]."');";
            if (!mysqli_query($conexao, $sql)){
                $erro++; //se der erro incrementa no contador para cancelar a transação
            }
        }
        
        //Verifica se houve erro para cancelar a transação
        if ($erro == 0){
            mysqli_commit($conexao);
            mysqli_close($conexao);
            header("location:classificacaoPostagens.php");
        } else {
            mysqli_close($conexao);
            
        }
    }
}