<div class="container flex justify-center p-5">
	<div class="flex flex-wrap justify-center">
		<?php foreach ($affichAcc->relTblUtisateurPost() as $data) { ?>
			<div class="border border-indigo-600 w-1/4 m-2 ">
				<div class="">
					<h1> <?php echo $data['titre'] ?></h1>
				</div>
				<div class="">
					<?php echo $data['contenu'] ?>
				</div>
				<div class="flex">
					<div>
						Auteur du post :
					</div>
					<?php echo $data['nom'] ?>
				</div>
				<div class="flex justify-between m-10">
					<?php if ($_SESSION['LOGGED_USER']) :
					?>
						<div>
							<button class="btn btn-blue bg-blue-500 text-white font-bold py-2 px-4 rounded-full"> editer</button>
						</div>
						<div>
							<button class="btn btn-blue bg-blue-500 text-white font-bold py-2 px-4 rounded-full"> supprimer </button>
						</div>
					<?php endif;
					?>
				</div>

			</div>
		<?php
		};
		?>
	</div>
</div>