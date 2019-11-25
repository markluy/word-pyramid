<?php

require_once('classes/WordAnalyzer.php');

$searchSumitted = false;
$word = new WordAnalyzer;

if (isset($_POST['word'])) {
	$searchSumitted = true;
	$word->setWord($_POST['word']);
	$isPyramid = $word->isPyramid();
}

?>

<h3>Word Pyramid Exercise</h3>

<div style="width: 50%;">

	<p>Enter a word and we'll tell you if it can be made into a word pyramid.</p>

	<? if ($searchSumitted): ?>

		<p style="background-color: #eee; padding: 10px;">
			<strong><? echo $word->isEmpty() ? 'An empty string' : htmlspecialchars($word); ?></strong>
			is<? if (!$isPyramid): ?> NOT<? endif; ?> a pyramid.
		</p>

	<?php endif; ?>

	<form method="POST">
		Word:
		<input type="text" name="word" value="<? echo htmlspecialchars($word); ?>">
		<button type="submit">Submit</button>
	</form>

</div>