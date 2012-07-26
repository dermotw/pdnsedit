<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Domain
 *
 * @author dermot_w
 */
class Domain extends AppModel {

	public $recursive = -1;

	public $hasMany = array (
		'Record' => array(
			'className' => 'Record',
			'foreignKey' => 'domain_id',
			'dependent' => true
		)
	);

	public function findContaining( $query ) {
                $db = $this->getDataSource();
                $result = $db->fetchAll(
                        "SELECT * FROM domains WHERE name like '$query%'  LIMIT 10"
                );
		return ( $result );
	}

}

?>
