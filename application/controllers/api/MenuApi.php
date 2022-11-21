<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "libraries/Format.php";
require APPPATH . "libraries/RestController.php";

use chriskacerguis\RestServer\RestController;

class MenuApi extends RestController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelMenu');
	}
	public function index_get()
	{
		$menu = new ModelMenu;
		$resultmenu = $menu->getMenu()->result_array();
		$this->response($resultmenu, 200);
	}
	public function MenuById_get($id)
	{
		$menu = new ModelMenu;
		$resultmenu = $menu->get_menu_byid($id);
		$this->response($resultmenu, 200);
	}
	public function MenuPromo_get()
	{
		$menu = new ModelMenu;
		$resultmenu = $menu->get_menu_promo();
		$this->response($resultmenu, 200);
	}
	public function MenuMakanan_get()
	{
		$menu = new ModelMenu;
		$resultmenu = $menu->get_menu_makanan();
		$this->response($resultmenu, 200);
	}
	public function MenuMinuman_get()
	{
		$menu = new ModelMenu;
		$resultmenu = $menu->get_menu_minuman();
		$this->response($resultmenu, 200);
	}
	public function MenuBuah_get()
	{
		$menu = new ModelMenu;
		$resultmenu = $menu->get_menu_buah();
		$this->response($resultmenu, 200);
	}
}
