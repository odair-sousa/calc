<?php
/* Smarty version 3.1.39, created on 2021-08-30 21:36:08
  from '/var/www/wise/calcula/view/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_612d797826de21_81133667',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '68a72d7255b34cfe594bd4c19a27f3bef17e920b' => 
    array (
      0 => '/var/www/wise/calcula/view/templates/index.tpl',
      1 => 1630370165,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_612d797826de21_81133667 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../view/templates/estilos.css"/>
    <?php echo '<script'; ?>
 src="https://kit.fontawesome.com/dbe2984bbb.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="../view/templates/script.js"><?php echo '</script'; ?>
>
    <title>Calculadora</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  </head>
  <body>
    
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby"staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Histórico</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
        </div>
        <div class="modal-body">
          <h4>
              <ul class="local-historico">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['historico']->value, 'his');
$_smarty_tpl->tpl_vars['his']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['his']->value) {
$_smarty_tpl->tpl_vars['his']->do_else = false;
?>
                 <li title="<?php echo $_smarty_tpl->tpl_vars['his']->value[1];?>
"><button class="btn historico btn-info mb-2"><numero><?php echo $_smarty_tpl->tpl_vars['his']->value[0];?>
</numero> = <?php echo $_smarty_tpl->tpl_vars['his']->value[2];?>
</button></li>
                 <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </ul>
          </h4> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>                                    

  <div class="geral">

      <form id="calcula" name="calcula" class="calc">
          <input class="visor" id="tela" type="text"/>
      </form> 

    
      <table class="corpo">
              
          <tr id="teste" action="" method="post">
              <td><input id="borracha" class="bot btn btn-info" type="button" value="C" onclick="deleteAll()"></td>
              <td><button type="button" id="limpar" class="bot btn btn-info"><i class="fas fa-backspace"></i></button></td>
              
              <td>
                <button type="button" class="bot btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  <i class="fas fa-history"></i>
                </button>
              </td>

              <td><input  id="dividir" class="bot btn btn-info" type="button" value="/" onclick="nume('/')"></td>
          </tr>
          <tr id="form1">
              <td><input id="sete" class="num btn btn-info" type="button" value="7" onclick="nume(7)"/></td>
              <td><input id="oito" class="num btn btn-info" type="button" value="8" onclick="nume(8)"></td>
              <td><input id="nove" class="num btn btn-info" type="button" value="9" onclick="nume(9)"></td>
              <td><input id="vezes"  class="bot btn btn-info" type="button" value="*" onclick="nume('*')"></td>
          </tr>
          <tr>
              <td><input id="quatro" class="num btn btn-info" type="button" value="4" onclick="nume(4)"></td>
              <td><input id="cinco" class="num btn btn-info" type="button" value="5" onclick="nume(5)"></td>
              <td><input id="seis" class="num btn btn-info" type="button" value="6" onclick="nume(6)"></td>
              <td><input id="menos"  class="bot btn btn-info" type="button" value="-" onclick="nume('-')"></td>          
          </tr>
          <tr>
              <td><input id="um" class="num btn btn-info" type="button" value="1" onclick="nume(1)"></td>
              <td><input id="dois" class="num btn btn-info" type="button" value="2" onclick="nume(2)"></td>
              <td><input id="tres" class="num btn btn-info" type="button" value="3" onclick="nume(3)"></td>
              <td><input id="mais" class="bot btn btn-info" type="button" value="+" onclick="nume('+')"></td>
          </tr>
          <tr>
              <td><input id="zero" class="zero num btn btn-info" type="button" value="0" onclick="nume(0)"></td>
              <td><input id="virgula" class="bot btn btn-info" type="button" value="," onclick="nume(',')"></td>
              <td><input id="porcento" class="bot btn btn-info" type="button" value="%" onclick="nume('%')"></td>
              <td><input id="result"  class="bot btn btn-info" type="button" value="=" onclick=""></td>
          </tr>
      </table>
      </form>
  </div>

    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"><?php echo '</script'; ?>
>
  </body>
</html><?php }
}
