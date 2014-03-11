<?php
	include('dom/simple_html_dom.php');
    $file = '*********************';
    $current = '';
	$subjects = array('AFST', 'AMST', 'ANTH', 'APSC', 'ARAB', 'ART', 'ARTH', 'AMES', 'BIOL', 'BUAD', 'CHEM', 'CHIN', 'CLCV', 'COLL', 'CMST', 'CSCI', 'CRWR', 'CRIN', 'DANC', 'ECON', 'EPPL', 'EDUC', 'ENGL', 'ENSP', 'EURS', 'FMST', 'FILM', 'FREN', 'GSWS', 'GIS', 'GEOL', 'GRMN', 'GBST', 'GOVT', 'GRAD', 'GREK', 'HBRW', 'HISP', 'HIST', 'HONR', 'INTR', 'INRL', 'ITAL', 'JAPN', 'KINE', 'LATN', 'LAS', 'LAW', 'LING', 'LCST', 'MSCI', 'MATH', 'MREN', 'MLSC', 'MDLL', 'MUSC', 'NSCI', 'PHIL', 'PHYS', 'PSYC', 'PBHL', 'PUBP', 'RELG', 'RUSN', 'RPSS', 'SCI', 'SOCL', 'SPCH', 'THEA', 'WMST', 'WRIT'); 
	
	for($i=0; $i < count($subjects); $i++) {
		$page = 'https://courselist.wm.edu/courseinfo/searchresults?term_code=201510&status=0&attr=0&levl=0&sort=crn_key&order=asc&term_subj=' . $subjects[$i];
		$html = file_get_html($page);
		foreach($html->find('tr') as $row) {
			$crn		= trim($row->find('td',0)->plaintext);
			$id		= trim($row->find('td',1)->plaintext);
			$title		= trim($row->find('td',3)->plaintext);
			$status	= trim($row->find('td',11)->plaintext);
            $current .= $crn . "** ";
            $current .= $id . "** ";
            $current .= $title . "** ";
            $current .= $status . "\n";
		}
	}
	
    $handle = fopen ($file, "w+");
    fclose($handle);
    file_put_contents($file, $current);
?>