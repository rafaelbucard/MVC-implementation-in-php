<?php $render('header'); ?>

<a href="<?=$base;?>/novo">Novo Usuários</a>

<table border='1'width='100%'>
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>AÇÕES</th>
    </tr>
    <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?=$usuario['id'];?></td>
            <td><?=$usuario['nome'];?></td>            
            <td><?=$usuario['email'];?></td>
            <td>
                <a href="<?=$base;?>/usuario/<?=$usuario['id'];?>/editar">[Editar]</a>
                <a href="<?=$base;?>/usuario/<?=$usuario['id'];?>/excluir" onclick="return confirm('Tem certeza que deseja excluir?')">[Excluir]</a>
            </td>
        </tr>
    <?php endforeach; ?>
 
</table>

<?php $render('footer');?>