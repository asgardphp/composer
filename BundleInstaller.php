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
		if(file_exists('composer/install.php'))
			require 'composer/install.php';
		else
			parent::install($repo, $package);
	}

	/**
	* {@inheritDoc}
	*/
	public function update(InstalledRepositoryInterface $repo, PackageInterface $initial, PackageInterface $target) {
		if(file_exists('composer/update.php'))
			require 'composer/update.php';
		else
			parent::update($repo, $initial, $target);
	}

	/**
	* {@inheritDoc}
	*/
	public function uninstall(InstalledRepositoryInterface $repo, PackageInterface $package) {
		if(file_exists('composer/uninstall.php'))
			require 'composer/uninstall.php';
		else
			parent::uninstall($repo, $package);
	}

	/**
	* {@inheritDoc}
	*/
	public function getInstallPath(PackageInterface $package) {
		if(file_exists('composer/getInstallPath.php'))
			return require 'composer/getInstallPath.php';
		else
			return parent::getInstallPath($package);
	}

	/**
	* {@inheritDoc}
	*/
	public function isInstalled(InstalledRepositoryInterface $repo, PackageInterface $package) {
		if(file_exists('composer/isInstalled.php'))
			return require 'composer/isInstalled.php';
		else
			return parent::isInstalled($repo, $package);
	}

	/**
	* {@inheritDoc}
	*/
	public function supports($packageType) {
		if(file_exists('composer/supports.php'))
			return require 'composer/supports.php';
		else
			return true;
	}
}