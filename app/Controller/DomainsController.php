<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DomainsController
 *
 * @author dermot_w
 */
class DomainsController extends AppController {
	public $components = array('RequestHandler');
	public $helpers = array('Html', 'Form',
			'TB' => array( 'className' => 'TwitterBootstrap.TwitterBootstrap'),
			'Js' => array('Js' => 'Jquery' ),
			'Paginator'
			);

	public $conditions = array(
		"NOT" => array(
			"name" => "%.arpa"
		)
	);


	public $paginate = array(
		'fields' => array('id', 'name'),
		'limit' => 10,
		'order' => array( 'name' => 'asc' ),
	);

	public function listDomains() {
		$arpaFilter = Configure::read('filter_arpa');
		$conditions = array();
		if ( $arpaFilter == True ) {
			$conditions = array( 'name NOT LIKE' => '%.arpa' );
		}
		$domains = $this->paginate('Domain', $conditions); 
		$paginator = $this->params;
		if ( $this->request->is('ajax') ) {
			$this->set( 'domains', $domains );
		}
		if ( $this->request->is('requested')) {
			return array( 'domains' => $domains, 'paginator' => $paginator, 'paging' => $this->params['paging'] );
		} else {
			$this->set( 'domains', $domains );
		}
	}

	public function getById($id = null) {
		$this->set('records', $this->Domain->Record->findAllByDomainId($id));
	}

        public function searchDomain( $query = null ) {
		$resultSet = $this->Domain->findContaining( $query ); 
		if ( $this->request->is('ajax') ) {
			$this->set('results', $resultSet);
		} else {
			$this->set('results', $resultSet);
		}

        }

	public function edit($id = null) {
		$this->paginate = array(
			'conditions' => array('domain_id' => $id, 'type !=' => 'SOA'),
			'limit' => 15,
			'order' => 'name ASC'
		);
		$records = $this->paginate('Record');
		$domain = $this->Domain->findById($id);
		$soa = $this->Domain->Record->findByDomainIdAndType( $id, 'SOA' );
		$this->set('soa', $soa);
		$this->set('domain', $domain);
		$this->set('records', $records);
	}

	public function add() {
		$domainName = $this->data['domain'];
		$domainData = array(
			'name' => $domainName,
			'ttl' => $this->data['ttl'],
			'type' => 'NATIVE'
		);
		if( $this->Domain->save( $domainData ) ) {
			$this->Session->setFlash('Record added!');
			$newId = $this->Domain->id;
			$this->set( compact( 'newId', 'domainName' ) );
		}
		$soaData = array(
			'domain_id' => $newId,
			'name' => $this->data['domain'],
			'type' => 'SOA',
			'content' => 'auth-ns1.irishbroadband.ie admin.imagine.ie ' . time() . ' 16384 2048 1048576 2560',
			'ttl' => 2560
		);
		$nsOneData = array(
			'domain_id' => $newId,
			'name' => $this->data['domain'],
			'type' => 'NS',
			'content' => 'auth-ns1.irishbroadband.ie',
			'ttl' => 86400
		);
		$nsTwoData = array(
			'domain_id' => $newId,
			'name' => $this->data['domain'],
			'type' => 'NS',
			'content' => 'auth-ns2.irishbroadband.ie',
			'ttl' => 86400
		);
		if( $this->Domain->Record->save( $soaData ) ) {
			//$this->Session->setFlash('SOA added!');
		}
		$this->Domain->Record->create();
		if( $this->Domain->Record->save( $nsOneData ) ) {
			//$this->Session->setFlash('First NS added!');
		}
		$this->Domain->Record->create();
		if( $this->Domain->Record->save( $nsTwoData ) ) {
			//$this->Session->setFlash('Second NS added!');
		}
		$this->Domain->Record->create();
	}

	public function DeleteDomain( $id = null ) {
		$data = $this->Domain->findById($id);
		$this->set( compact( 'data' ) );
		if( $this->Domain->delete( $id ) ) {
		}
	}
}

?>
