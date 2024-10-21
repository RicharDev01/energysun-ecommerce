<?php
	
	use App\Config\Parameters;
	
	$header = __DIR__ . '/../layouts/header.php';
	
	require_once $header;

?>

<main class="container">
	<form action="<?=Parameters::BASE_URL?>/auth/encriptador/encriptar"  method="post" class="form">
		
		<div class="form__group">
			
			<label for="password">Contraseña:</label>
			<input type="password" name="password" id="password" placeholder="********" class="form__input">
		
		</div>
		
		<button type="submit" class="btn btn-primary" >Enciptar contraseña</button>
		
	</form>
	
	<?php if( isset($pass_encrip) ): ?>
	
		<div class="message-alert">
			<div class="message__content"> <?= $pass_encrip ?>  </div>
		</div>
	<?php endif; ?>
	
</main>

<?php
	$footer = __DIR__ . '/../layouts/footer.php';
	require_once $footer; ?>