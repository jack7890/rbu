<?php

class Causes {

	const NAME_IDX = 0;
	const DESC_IDX = 1;
	const URL_IDX  = 2;

	protected $categories = array();
	protected $data = array();

	public function __construct($csv) {
		if (($fh = fopen($csv, 'r')) !== false) {
    		while (($data = fgetcsv($fh, 1000, ",")) !== false) {
    			list ($categories, $name, $desc, $url) = $data;
    			$categories = explode(';', $categories);
    			foreach ($categories as $category) {
    				$category = trim($category);
	    			if (!isset($this->categories[$category])) {
	    				$this->categories[$category] = count($this->categories);
	    			}
	    			$this->data[$this->categories[$category]][] = array(
						$name, $desc, $url
					);
    			}
    		}
    		fclose($fh);
    	}
    	ksort($this->categories);
	}

	public function getCategories() {
		return $this->categories;
	}

	public function getCauses($categoryIndex) {
		$causes = array();
		if (isset($this->data[$categoryIndex])) {
			$causes = $this->sortCauses($this->data[$categoryIndex]);
		}
		return $causes;
	}

	public function getAllCauses() {
		$causes = array();
		foreach ($this->data as $categoryIndex => $categoryCauses) {
			$causes = array_merge($causes, $categoryCauses);
		}
		return $this->sortCauses($causes);
	}

	protected function sortCauses($causes) {
		$names = array();
		foreach ($causes as $k => $v) {
			$names[$k] = $v[self::NAME_IDX];
		}
		array_multisort($names, SORT_ASC, $causes);
		return $causes;
	}

}