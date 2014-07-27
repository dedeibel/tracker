<?php $this->title('Encoding profiles | ') ?>

<?php if (User::isAllowed('encodingprofiles', 'create')): ?>
	<ul class="ticket-header-bar right horizontal table">
		<li class="ticket-header-bar-background-left"></li>
			<li class="action create"><?php echo $this->linkTo('encodingprofiles', 'create', '<span>create</span>', 'Create new encoding profile…'); ?></li>
		<li class="ticket-header-bar-background-right"></li>
	</ul>
<?php endif; ?>

<div class="table">
	<h2>Encoding profiles</h2>
	
	<table>
		<thead>
			<tr>
				<th width="30%">Name</th>
				<th width="10%">Slug</th>
				<th width="10%">Extension</th>
				<th></th>
				<th></th>
				<th width="3%">&nbsp;</th>
				<th width="5%">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($profiles as $profile): ?>
				<tr>
					<td><?= h($profile['name']); ?></td>
					<td><?= h($profile['slug']); ?></td>
					<td><?= h($profile['extension']); ?></td>
					<td class="link"><?php if (User::isAllowed('encodingprofiles', 'view')) {
						echo $this->linkTo('encodingprofiles', 'view', $profile, 'Show ' . $profile['versions_count'] . ' version' . (($profile['versions_count'] == 1)? '' : 's'));
					} ?></td>
					<td></td>
					<td class="link hide right"><?php if (User::isAllowed('encodingprofiles', 'delete')) {
						echo $this->linkTo('encodingprofiles', 'delete', $profile, 'delete', array('data-dialog-confirm' => 'Are you sure you want to permanently delete this encoding ticket?'));
					} ?></td>
					<td class="link hide right"><?php if (User::isAllowed('encodingprofiles', 'edit')) {
						echo $this->linkTo('encodingprofiles', 'edit', $profile, 'edit');
					} ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
		
	</table>
	<?php if (!isset($profile)): ?>
		<p>
			No existing encoding profiles found.
			<?php if (User::isAllowed('encodingprofiles', 'create')) {
				echo $this->linkTo('encodingprofiles', 'create', 'Create new encoding profile') . '.';
			} ?>
		</p>
	<?php endif; ?>
</div>