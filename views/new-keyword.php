

<div style="color:red; width: 100%; text-align: center;margin-top: 30px;"><?php echo validation_errors(); ?></div>

<div class="new-keyword-section">

<h3><?php echo $message; ?></h3>

	<form action="http://localhost:8002/keywords/index.php/keywords/add_keyword" method="POST">

	    <label for="keyword">Keyword</label>
	    <input type="input" name="keyword" /><br />

	    <label for="language">Language</label>
	    <select name="language">
	    	<?php foreach ($languages as $language): ?>
	    	<option value="<?php echo $language['id']; ?>"> <?php echo $language['language']; ?> </option>
	    	<?php endforeach; ?>
	    </select><br />

	    <label for="report_type">Report Type</label>
	    <select name="report_type">
	    	<?php foreach ($report_types as $report_type): ?>
	    	<option value="<?php echo $report_type['id']; ?>"> <?php echo $report_type['type_name']; ?> </option>
	    	<?php endforeach; ?>
	    </select><br />

	    <label for="parent">Parent Type</label>
	    <select name="parent">
	    	<?php foreach ($parents as $parent): ?>
	    	<option value="<?php echo $parent['id']; ?>"> <?php echo $parent['parent_name']; ?> </option>
	    	<?php endforeach; ?>
	    </select><br />

	    <input type="submit" name="submit" value="Create news item" />

	</form>