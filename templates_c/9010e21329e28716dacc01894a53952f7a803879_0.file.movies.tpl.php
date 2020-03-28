<?php
/* Smarty version 3.1.33, created on 2020-02-20 18:03:17
  from 'C:\xampp\htdocs\WEB\TPE-Movies\templates\movies.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e4ebbd596eb46_65408093',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9010e21329e28716dacc01894a53952f7a803879' => 
    array (
      0 => 'C:\\xampp\\htdocs\\WEB\\TPE-Movies\\templates\\movies.tpl',
      1 => 1582218194,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e4ebbd596eb46_65408093 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="movies-list">
    <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['movies']->value, 'movie');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['movie']->value) {
?>
            <li>
                <div class="card" style="width: 18rem">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['movie']->value["imagen"];?>
" class="card-img" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['movie']->value["nombre"];?>
</h5>
                      <a href="/WEB/TPE-Movies/movies/<?php echo $_smarty_tpl->tpl_vars['movie']->value["id_peliculas"];?>
" class="btn btn-primary">See Comments</a>
                    </div>
                </div>
            </li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
</div>
<form action="add" method="post">
    <input type="text " name="nombre" value="Nombre">
    <input type="text " name="imagen" value="Imagen">
    <input type="text " name="descripcion" value="Descripcion">
    <input type="text " name="puntaje" value="Puntaje">
    <input type="submit" value="Subir">
</form>

<?php }
}
