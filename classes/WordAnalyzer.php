<?php

/**
 * Class used to perform various analyses on a word
 */
class WordAnalyzer
{
	/**
	 * @var string
	 */
	protected $word;

	/**
	 * Constructor
	 *
	 * @param string word
	 */
	public function __construct(string $word = '')
	{
		$this->word = $word;
	}

	/**
	 * setWord will set a new word for the object
	 *
	 * @param string word
	 */
	public function setWord(string $word = '') : WordAnalyzer
	{
		$this->word = $word;
		return $this;
	}

	/**
	 * Determines whether or not the word can be made into a pyramid
	 */
	public function isPyramid() : bool
	{
		# initial check to see if the string has any characters
		# assumption is that an empty string is not a valid pyramid
		if ($this->isEmpty()) {
			return false;
		}

		# build a mapping of characters
		# ex: Hello will produce ['h' => 1, 'e' => 1, 'l' => 2, 'o' => 1]
		$charMap = [];
		foreach (count_chars(strtolower($this->word), 1) as $charIndex => $count) {
			$character = chr($charIndex);
			$charMap[$character] = $count;
		}

		# Sort the counts of the word in ascending order
		# ex: Hello will produce [1, 1, 1, 2]
		sort($charMap);
		
		# now loop through the array of counts to determine if the word is a pyramid
		foreach ($charMap as $i => $count) {

			# the 2nd 1 of Hello will fail because the count should be 2 to be a valid pyramid
			if ($count != ($i + 1)) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Determines whether or not the word is empty
	 */
	public function isEmpty() : bool
	{
		return !$this->word;
	}

	/**
	 * Method for rendering the object as a string
	 */
	public function __toString() : string
	{
		return $this->word;
	}
}