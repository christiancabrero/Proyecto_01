<html>
<head></head>
<body>
<div class='wrap'><h2>Configuracion de notificaciones SEO por email</h2></div>
<h3>Estadisticas</h3>

<?php
// Fecha actual:
echo ("Fecha actual: ");
echo (date('d/m/Y'));
// Fecha de un post:
echo ("<br/>Fecha del último post: ");
echo (get_the_date('d/m/Y'));
echo (query_posts('orderby=date&order=desc&showposts=1'));
?>

<!-- Posible loop -->
<?php

$i=4;
// Muestra la última entrada de la categoria especificada:
query_posts('cat='.$i.'&showposts=1');
// query_posts('cat=$i&showposts=1&order_by=date&order=DESC');
?>
<?php while (have_posts()) : the_post(); ?>
<br/><br/>
<?php 
echo ("Ultima entrada de la categoria ".get_cat_name($i)."<br/>");
echo (get_the_date('d/m/Y')." "); ?>
<a href="<?php the_permalink(); ?> "><?php the_title(); ?></a>
<?php endwhile;
wp_reset_query();

?>

<h3>Ajustes</h3>
<form method='post'>
	<input type='hidden' name='action' value='salvaropciones'>
	<table>
		<!-- La obtencion del valor es diferente con el checkbox: value="1" y checked(valor,get_option())
		https://codex.wordpress.org/Function_Reference/checked
		Con el tipo texto solo hay que traer el valor con get_option() -->
		<tr>
			<td>
				<input type='checkbox' name='categorias' id='categorias' value='categorias' <?php checked( 'categorias', get_option( 'form_etiquetas' ) ); ?>>
				<label for='categorias'>Notificar de Categorias descuidadas</label><br/>
			</td>
		</tr>
		<tr>
			<td>
				<input type='checkbox' name='etiquetas' id='etiquetas' value='tags' <?php checked( 'tags', get_option( 'form_etiquetas' ) ); ?>>
				<label for='etiquetas'>Notificar de Etiquetas descuidadas</label><br/><br/>
			</td>
		</tr>
		<tr>
			<td>
				<label for='dias'>Dias sin escribir categorias o etiquetas:</label><br/>
				<input size='3' type='text' name='dias' id='dias' value='<?=get_option('form_dias')?>'>(dias)<br/><br/>
			</td>
		</tr>
		<tr>
			<td>
				<label for='email'>Email de reporte:</label><br/>
				<input size='30' type='text' name='email' id='email' value='<?=get_option('form_email')?>'><br/><br/>
			</td>
		</tr>
		<tr>
			<td>
				<input type='checkbox' name='activo' id='activo' value='on' <?php checked( 'on', get_option( 'form_activo' ) ); ?>>
				<label for='activo'>Enviar emails</label><br/><br/>
			</td>
		</tr>
		<tr>
			<td colspan='2'>
				<input type='submit' value='Guardar'>
			</td>
		</tr>

	</table>
</form>

</body>
</html>