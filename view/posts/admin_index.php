<div class="page-header">
	<h1>Toutes les publications</h1>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th>En ligne ?</th>
			<th scope="col">Titre</th>
			<th scope="col">Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($posts as $key => $value) { ?>
			<tr>
				<td scope="row"><?= $value->id ?></td>
				<td><span class="<?= $value->online == 1 ? 'text-success' : 'text-danger' ?>"><?= $value->online == 1 ? 'En ligne' : 'Hors ligne' ?></span></td>
				<td><?= $value->name ?></td>
				<td>
					<p><button><a href="<?= BASE_URL.DS.'posts/admin_index?id='.$value->id.'&action=accept' ?>">Accepter</a></button></p>
					<p><button><a href="<?= BASE_URL.DS.'posts/admin_index?id='.$value->id.'&action=refuse' ?>">Refuser</a></button></p>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
