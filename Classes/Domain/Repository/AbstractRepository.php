<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Dirk Wenzel <wenzel@webfox01.de>, Agentur Webfox
 *  Michael Kasten <kasten@webfox01.de>, Agentur Webfox
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package t3events
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */

class Tx_T3events_Domain_Repository_AbstractRepository extends Tx_Extbase_Persistence_Repository {
	/**
	 * @var string A comma separated string containing uids $recordList
	 * @var string Sort by field $sortField
	 * @return Tx_Extbase_Persistence_QueryResult Matching Records
	 */
	public function findMultipleByUid($recordList, $sortField='uid') {
		$uids = t3lib_div::intExplode(',', $recordList, TRUE);
		$constraints = array();
		
		$query = $this->createQuery();
		
		foreach ($uids as $uid) {
			$constraints[] = $query->equals('uid', $uid);
		}
		
		count($constraints)?$query->matching($query->logicalOr($constraints)):FALSE;
		
		$query->setOrderings(array($sortField => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));
        return $query->execute();
	}
}

?>