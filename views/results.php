<div class="content">

<?php if(count($keywords)){ ?>

	<p>Total results: <?php echo count($keywords); ?> </p>

	<table style="border:solid 1px #EEE">
		<thead>
			<tr>
				<td>Keyword 1</td>
				<td>Keyword 2</td>
				<td>Language</td>
				<td>Report Type</td>
				<td>Parent</td>
			</tr>
		</thead>
		<tbody>
					
		<?php foreach ($keywords as $keyword): ?>
			<tr>
				<td style="border:1px solid #EEE">
					<?php echo $keyword['keyword_one']; ?>
				</td>
				<td style="border:1px solid #EEE">
					<?php echo $keyword['keyword_two']; ?>
				</td>
				<td style="border:1px solid #EEE">
					<?php echo $keyword['language']; ?>
				</td>
				<td style="border:1px solid #EEE">
					<?php echo $keyword['type_name']; ?>
				</td>
				<td style="border:1px solid #EEE">
					<?php echo $keyword['parent_name']; ?>
				</td>
			</tr>

			<?php endforeach; ?>

		<?php } else { echo "No match"; } ?>

		</tbody>
	</table>

</div>