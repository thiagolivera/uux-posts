<?php
$listaPostagens = $controle->obterPostagensNaoClassificadas($idAvalicao, $_SESSION["login"]);
if(count($listaPostagens) == 0){
    ?>
    <script>
        window.location.href = "../etapa4/introEtapa4.php?fimClassificacao";
    </script>
    <?php
}
?>

<div class="table-responsive">
    <div class="table">
        <table class="table table-hover no-margin">
            <tbody>
                <form action="porConjuntoControle.php" method="post">
                    <input type="hidden" name="idAvaliacao" value="<?php echo $idAvalicao;?>">
                    <input type="hidden" name="numPostagens" value="<?php echo count($listaPostagens);?>">
                    <?php 
                    for($i=0; $i < count($listaPostagens); $i++){
                        ?>
                        <tr>
                        <input type="hidden" name="idPostagem<?php echo $i;?>" value="<?php echo $listaPostagens[$i]["idPostagem"];?>">
                            <td style="width: 15%" rowspan="2"><p style="text-align: center; font-style: italic; width: 250px">"<?php echo $listaPostagens[$i]["postagem"];?>"</p></td>

                            <td style="width: 5%" rowspan="2" style="justify-content: center;">
                                <div class="col-sm-6" style="padding-bottom: 10px; display: none">
                                    <button class="btn btn-primary center-block disabled"><i style="font-size: 11px" class="fa fa-star"></i></button>
                                    <br>
                                    <button class="btn btn-warning center-block disabled"><i class="fa fa-question"></i></button>
                                </div>
                            </td>

                            <td style="width: 21.25%">
                                <select required="" name="classPRU<?php echo $i;?>" class="form-control" style="width: 156px">
                                    <option selected>PRU</option>
                                    <option>Não-PRU</option>
                                </select>
                            </td>
                            <?php 
                            if(strcmp($categoriasClassificacao[0]["funcionalidade"], '1') == '0'){
                                ?>
                                <td style="width: 21.25%">
                                    <input name="classFuncionalidade<?php echo $i;?>" type="text" style="width: 156px" class="form-control" id="funcionalidade" name="funcionalidade" placeholder="Funcionalidade">
                                </td>
                            <?php
                            }
                            if(strcmp($categoriasClassificacao[0]["tipo"], '1') == '0'){
                                ?>
                                <td style="width: 21.25%">
                                    <select required name="classTipo<?php echo $i;?>[]" style="width: 156px" class="form-control select2" multiple="multiple" data-placeholder="Tipo de PRU" style="width: 100%;">
                                        <option>Crítica</option>
                                        <option>Elogio</option>
                                        <option>Dúvida</option>
                                        <option>Comparação</option>
                                        <option>Sugestão</option>
                                        <option>Ajuda</option>
                                    </select>
                                </td>
                            <?php
                            } if(strcmp($categoriasClassificacao[0]["intencao"], '1') == '0'){
                                ?>
                                <td style="width: 21.25%">
                                    <select required name="classIntencao<?php echo $i;?>" id="intencao" style="width: 156px" class="form-control select2" multiple="multiple" data-placeholder="Intenção" style="width: 100%;">
                                        <option>Visceral</option>
                                        <option>Comportamental</option>
                                        <option>Reflexiva</option>
                                    </select>
                                </td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <?php
                            if(strcmp($categoriasClassificacao[0]["analiseSentimentos"], '1') == '0'){
                                ?>
                                <td>
                                    <select required name="classSentimento<?php echo $i;?>" id="sentimento" class="form-control select2" multiple="multiple" data-placeholder="Sentimento" style="width: 156px">
                                        <option>Positiva</option>
                                        <option>Negativa</option>
                                        <option>Neutra</option>
                                    </select>
                                </td>
                            <?php
                            } if(strcmp($categoriasClassificacao[0]["usabilidade"], '1') == '0'){
                                ?>
                                <td>
                                    <select name="classUsabilidade<?php echo $i;?>[]" class="form-control select2" multiple="multiple" data-placeholder="Facetas Usabilidade" style="width: 156px">
                                        <option>Eficácia</option>
                                        <option>Eficiencia</option>
                                        <option>Satisfação</option>
                                        <option>Segurança</option>
                                        <option>Utilidade</option>
                                        <option>Memorabilidade</option>
                                        <option>Aprendizado</option>
                                    </select>
                                </td>
                            <?php
                            } if(strcmp($categoriasClassificacao[0]["ux"], '1') == '0'){
                                ?>
                                <td>
                                    <select name="classUX<?php echo $i;?>[]" class="form-control select2" multiple="multiple" data-placeholder="Facetas UX" style="width: 156px">
                                        <option>Afeto</option>
                                        <option>Estética</option>
                                        <option>Frustração</option>
                                        <option>Satisfação</option>
                                        <option>Motivação</option>
                                        <option>Suporte</option>
                                    </select>
                                </td>
                            <?php
                            } if(strcmp($categoriasClassificacao[0]["artefato"], '1') == '0'){
                                ?>
                                <td>
                                    <input style="width: 156px" type="text" class="form-control" id="artefato" name="classArtefato<?php echo $i;?>" placeholder="Artefato">
                                </td>
                            <?php
                            }
                            ?>
                        </tr>
                        <?php
                    } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row" style="padding-top: 20px">
        <div id="btnVoltar" style="float: left; padding-bottom: 10px;">
            <button class="btn btn-info" onclick="voltar()" style="margin-left: 10px;">Voltar</button>
        </div>
        <div id="btnSalvar" style="float: right; padding-bottom: 10px;">
            <button class="btn btn-info" type="submit" style="margin-right: 10px;">Salvar e próximo</button>
        </div>
    </form>
    </div>

<script>
    function voltar(){
        window.location.href = "introEtapa3.php";
    }
</script>


<style>
    #tipo{
        vertical-align: middle;
    }
</style>