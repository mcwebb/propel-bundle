<?php
namespace Ditto\Propel;
use \Ditto\Core\Engine;

class Bundle extends \Ditto\Core\Bundle {
	protected $bundle_name = 'Propel';
	protected $bundle_type = 'ORM';

	private $forceRoot = false;
	private $propel_project = '';

	public function construct() {}

	public function init() {
		if ($this->forceRoot)
			$path = $this->forceRoot;
		else $path = Engine::root(true);
		$path .= 'vendor/propel/propel1/runtime/lib/Propel.php';
		require $path;
		\Propel::init(
			self::$root_abs
			. 'conf/'
			. $this->propel_project
			. '-conf.php'
		);
		set_include_path(
			get_include_path() .PATH_SEPARATOR.
			self::$root_abs.'classes'
		);
		date_default_timezone_set('Europe/London');
		return $this;
	}

	public function setProject($propel_project) {
		$this->propel_project = $propel_project;
		return $this;
	}

	public function forceRoot($path) {
		$this->forceRoot = $path;
		self::$root_abs = $path . 'vendor/ditto/propel-bundle/src/Ditto/Propel/';
		return $this;
	}
}