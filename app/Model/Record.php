<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Record
 *
 * @author dermot_w
 */
class Record extends AppModel {
	// A record belongs to a domain...
	//
	public $belongsTo = 'Domain';
	public $recursive = -1;
}

?>
