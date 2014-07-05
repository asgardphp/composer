<?php
namespace Asgard\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class BundleInstallerPlugin implements PluginInterface {
	public function activate(Composer $composer, IOInterface $io) {
		$installer = new BundleInstaller($io, $composer);
		$composer->getInstallationManager()->addInstaller($installer);
	}
}