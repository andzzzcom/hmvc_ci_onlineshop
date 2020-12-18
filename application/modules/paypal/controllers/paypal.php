<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PayPal\Api\FundingInstrument;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;

class paypal extends MY_Controller {

	var $clientId = 'AeHbYFQRZecv7zPTaapSwXQpkBrl2RasL3lif3Yj14JicCeeNMRyoRwPd3S3SqHg5Q_e6GMqv_LvHp1y';
	var $clientSecret = 'ELHsci8CuwF3O7IaqB-AmKJSTMeZ9L5t7zSc7db_2WPfhkISPEvj0zhDMjddS0w6Yq7d0qkgeX-B_S3k';
	public function __construct()
	{
		parent::__construct();
		
		$this->paypal_configuration();
	}

	private function paypal_configuration()
	{
		$location = 'application/libraries/paypal/sample/bootstrap.php';
		require $location;
	}
	
	//main settings
	public function index()
	{
		$price = 1;
		$currency = 'USD';
		$quantity = 1;
		$item_name = 'tes';
		
		$apiContext = getApiContext($this->clientId, $this->clientSecret);

		// ### Payer
		// A resource representing a Payer that funds a payment
		// For paypal account payments, set payment method
		// to 'paypal'.
		$payer = new Payer();
		$payer->setPaymentMethod("paypal");

		// ### Itemized information
		// (Optional) Lets you specify item wise
		// information
		$item1 = new Item();
		$item1->setName($item_name)
				->setCurrency($currency)
				->setQuantity($quantity)
				->setPrice($price);

		$item2 = new Item();
		$item2->setName($item_name."2")
				->setCurrency($currency)
				->setQuantity($quantity)
				->setPrice($price);
				
		$itemList = new ItemList();
		$itemList->setItems(array($item1, $item2));
		// ### Additional payment details
		// Use this optional field to set additional
		// payment information such as tax, shipping
		// charges etc.
		$details = new Details();
		$details->setShipping(0)
				->setTax(0)
				->setSubtotal($price * 2);

		// ### Amount
		// Lets you specify a payment amount.
		// You can also specify additional details
		// such as shipping, tax.
		$amount = new Amount();
		$amount->setCurrency($currency)
				->setTotal($price * 2)
				->setDetails($details);

		// ### Transaction
		// A transaction defines the contract of a
		// payment - what is the payment for and who
		// is fulfilling it.
		$transaction = new Transaction();
		$transaction->setAmount($amount)
					->setItemList($itemList)
					->setDescription("Payment description")
					->setInvoiceNumber(uniqid());

		// ### Redirect urls
		// Set the urls that the buyer must be redirected to after
		// payment approval/ cancellation.
		$baseUrl = getBaseUrl();
		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl("$baseUrl/thankyou")
						->setCancelUrl("$baseUrl/thankyou/");

		// ### Payment
		// A Payment Resource; create one using
		// the above types and intent set to 'sale'
		$payment = new Payment();
		$payment->setIntent("sale")
				->setPayer($payer)
				->setRedirectUrls($redirectUrls)
				->setTransactions(array($transaction));


		// For Sample Purposes Only.
		$request = clone $payment;

		// ### Create Payment
		// Create a payment by calling the 'create' method
		// passing it a valid apiContext.
		// (See bootstrap.php for more on `ApiContext`)
		// The return object contains the state and the
		// url to which the buyer must be redirected to
		// for payment approval
		try {
			$payment->create($apiContext);
		} catch (Exception $ex) {
			ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $request, $ex);
			exit(1);
		}

		// ### Get redirect url
		// The API response provides the url that you must redirect
		// the buyer to. Retrieve the url from the $payment->getApprovalLink()
		// method
		$approvalUrl = $payment->getApprovalLink();

		header("location:".$approvalUrl);
	}
	
	
	public function thankyou()
	{
		$get = $this->input->get();
		$apiContext = getApiContext($this->clientId, $this->clientSecret);
		$error = false;



			// Get the payment Object by passing paymentId
			// payment id was previously stored in session in
			// CreatePaymentUsingPayPal.php
			$paymentId = $get['paymentId'];
			$payment = Payment::get($paymentId, $apiContext);

			// ### Payment Execute
			// PaymentExecution object includes information necessary
			// to execute a PayPal account payment.
			// The payer_id is added to the request query parameters
			// when the user is redirected from paypal back to your site
			$execution = new PaymentExecution();
			$execution->setPayerId($get['PayerID']);

			try {
				// Execute the payment
				// (See bootstrap.php for more on `ApiContext`)
				$result = $payment->execute($execution, $apiContext);

				//ResultPrinter::printResult("Executed Payment", "Payment", $payment->getId(), $execution, $result);

				try {
					$payment = Payment::get($paymentId, $apiContext);
				} catch (Exception $ex){
					$error = true;
					/*
					ResultPrinter::printError("Get Payment", "Payment", null, null, $ex);
					exit(1);
					*/
				}
			}catch (Exception $ex) {
				$error = true;
				/*
				ResultPrinter::printError("Executed Payment", "Payment", null, null, $ex);
				exit(1);
				*/
			}

			//ResultPrinter::printResult("Get Payment", "Payment", $payment->getId(), null, $payment);

			//return $payment;
	

	}
	
}
