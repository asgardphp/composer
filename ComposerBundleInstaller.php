<?php
namespace Asgard\Composer;

class ComposerBundleInstaller {
	protected $installCallbacks = [];
	protected $updateCallbacks = [];

	public function addInstallCallback($callback) {
		$this->installCallbacks[] = $callback;
		return $this;
	}

	public function addUpdateCallback($callback) {
		$this->updateCallbacks[] = $callback;
		return $this;
	}

	public function install($package) {
		foreach($this->installCallbacks as $callback)
			$callback($package);
		return $this;
	}

	public function update($package) {
		foreach($this->updateCallbacks as $callback)
			$callback($package);
		return $this;
	}
}