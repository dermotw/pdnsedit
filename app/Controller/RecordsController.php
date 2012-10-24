<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RecordsController
 *
 * @author dermot_w
 */
class RecordsController extends AppController {
	public $helpers = array('Html', 'Form', 'TwitterBootstrap.TwitterBootstrap', 'Session');

	public function index() {
		$this->paginate = array('all');
		$records = $this->paginate();
		$this->set(compact('records'));
	}

	public function add() {
		$theDomain = $this->data['domain'];


		// Need to see if the record is a PTR
		//
		if ( $this->data['type'] == 'PTR' ) {
			// Extract the PTR zone by removing the first part of xxx.xxx.xxx.xxx.in-addr.arpa
			//
			preg_match( '/^\d{1,3}\.(\d{1,3}\.\d{1,3}\.\d{1,3}\.in-addr\.arpa)/', $this->data['name'], $matches );
			$theDomain = $matches[1];
		}
		$domainInfo = $this->Record->Domain->findByName( $theDomain );
		$recordData = array(
				'domain_id' => $domainInfo['Domain']['id'],
				'name' => $this->data['name'],
				'type' => $this->data['type'],
				'content' => $this->data['content'],
				'ttl' => 86400
				);

		// We need to get the SOA so that we can increment the
		// serial
		$theSOA = $this->Record->findByDomainIdAndType ( $domainInfo['Domain']['id'], 'SOA' );
		$soaContent = preg_split( '/ /', $theSOA['Record']['content'], -1 );
		$dnsSerial = date('YmdHi');
		if ( $dnsSerial == $soaContent[2] ) { $dnsSerial ++; }
		$soaContent['2'] = $dnsSerial;
		$theSOA['Record']['content'] = implode( ' ', $soaContent );

		try {
			if( $this->Record->save( $recordData ) ) {
				$this->Session->setFlash('<h1>Record added!</h1><p>Nice one.</p>');
			} 
			$this->Record->save( $theSOA );
		} catch( Exception $e ) {
			$this->Session->setFlash("<h1>Oops!</h1><p>Couldn't add that record - do you need to create the zone first?</p>");
		}
	}

	public function DeleteRecord( $id = null ) {
		$data = $this->Record->findById($id);
		$this->set( compact( 'data' ) );
		if( $this->Record->delete( $id ) ) {
		}
	}

	public function updateRecord( $id = null, $name = null, $content = null ) {
		$data = array(
			'id' => $id,
			'name' => $name,
			'content' => $content
		);
		$oldData = $this->Record->findById( $id );
		$this->Record->save( $data );
		$this->set( compact( 'data', 'oldData' ) );
	}
}

?>
