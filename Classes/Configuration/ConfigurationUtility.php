<?php
namespace Fab\RedirectMessages\Configuration;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * A class for handling configuration of the extension
 */
class ConfigurationUtility implements SingletonInterface {

	/**
	 * @var string
	 */
	protected $extensionKey = 'redirect_messages';

	/**
	 * @var array
	 */
	protected $configuration = array();

	/**
	 * Returns a class instance.
	 *
	 * @return \Fab\RedirectMessages\Configuration\ConfigurationUtility
	 */
	static public function getInstance() {
		return GeneralUtility::makeInstance('Fab\RedirectMessages\Configuration\ConfigurationUtility');
	}

	/**
	 * Constructor
	 *
	 * @return \Fab\RedirectMessages\Configuration\ConfigurationUtility
	 */
	public function __construct() {

		/** @var \TYPO3\CMS\Extbase\Object\ObjectManager $objectManager */
		$objectManager = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');

		/** @var \TYPO3\CMS\Extensionmanager\Utility\ConfigurationUtility $configurationUtility */
		$configurationUtility = $objectManager->get('TYPO3\CMS\Extensionmanager\Utility\ConfigurationUtility');
		$configuration = $configurationUtility->getCurrentConfiguration($this->extensionKey);

		// Fill up configuration array with relevant values.
		foreach ($configuration as $key => $data) {
			$this->configuration[$key] = $data['value'];
		}
	}

	/**
	 * Returns a setting key.
	 *
	 * @param string $key
	 * @return array
	 */
	public function get($key) {
		return isset($this->configuration[$key]) ? $this->configuration[$key] : NULL;
	}

	/**
	 * @return array
	 */
	public function getConfiguration() {
		return $this->configuration;
	}
}
