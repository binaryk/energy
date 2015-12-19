<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */


	protected $current_user = NULL;

    public function __construct()
    {
		$this->current_user = auth()->user();
    }

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = view($this->layout);
		}
	}

}
