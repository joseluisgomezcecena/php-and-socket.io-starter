<?php

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;
use Twilio\Rest\Client as TwilioClient;

class Pages extends CI_Controller
{
	public function view($page = 'home')
	{
		if(!file_exists(APPPATH . 'views/pages/' . $page . '.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page);

		$alert_id = 2;
		$company_id = 77;

		$version = new Version2X('http://localhost:3001');
		$client = new Client($version);

		$client->initialize();
		//$client->emit('newOrder', ['message' => 'Hello World!']);
		$client->emit('newOrder', ['message' => 'Hello World!', 'alert_id' => $alert_id, 'company_id' => $company_id]);
		$client->close();



		$this->load->view('pages/' . $page, $data); //loading page and data

	}

}
