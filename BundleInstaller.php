<?php
namespace Asgard\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;
use Composer\Repository\InstalledRepositoryInterface;

class BundleInstaller extends LibraryInstaller {
	/**
	* {@inheritDoc}
	*/
	public function install(InstalledRepositoryInterface $repo, PackageInterface $package) {
		parent::install($repo, $package);

		require_once 'autoload.php';

		$kernel = new \Kernel();
		$kernel->load();
		$cbi = $kernel->getContainer()['composerBundleInstaller'];
		$cbi->install($package);
	}

	/**
	* {@inheritDoc}
	*/
	public function update(InstalledRepositoryInterface $repo, PackageInterface $initial, PackageInterface $target) {
		parent::update($repo, $initial, $target);

		require_once 'autoload.php';

		$kernel = new \Kernel();
		$kernel->load();
		$cbi = $kernel->getContainer()['composerBundleInstaller'];
		$cbi->update($package);
	}

	/**
	* {@inheritDoc}
	*/
	public function supports($packageType) {
		return $packageType == 'asgard-bundle';
	}
}