<?php
/**
* 	Adding an Index page to the frontend
*/
class Packt_Helloworld_IndexController extends Mage_Core_Controller_Front_Action
{
	
	public function indexAction()
	{		
		//echo $this->__("Test translate packt");
		$resource 	=	Mage::getSingleton('core/resource');
		$connection =	$resource->getConnection('core_read'); 

		$results = $connection->query('SELECT * FROM core_store')->fetchAll();

		Zend_Debug::dump($results);

		$dbConfig = array(
				'host'	=> 'localhost',
				'dbname'=> 'wordpress',
				'username' => 'root',
				'password' => 'password'
			);
		$_resource 	=	Mage::getSingleton('core/resource');
		$connection =	$resource->createConnection('wordpressConncetion', 'pdo_mysql', $dbConfig); 

		$results = $connection->query('SELECT * FROM wp_posts')->fetchAll();

		Zend_Debug::dump($results);
	}

	public function helloAction ()
	{
		$this->loadLayout()->renderLayout();
	}


	public function subscriptionAction() {

		$subscription = Mage::getModel('helloworld/subscription');

		$subscription->setFirstname('John');
		$subscription->setLastname('Doe');
		$subscription->setEmail('john.doe@example.com');
		$subscription->setMessage('A short message to test');

		$subscription->save();

		echo 'success';
	}
}