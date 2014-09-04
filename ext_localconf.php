<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

// Override classes for the Object Manager
$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\CMS\Core\Mail\MailMessage'] = array(
	'className' => 'Fab\RedirectMessages\Override\Core\Mail\MailMessage'
);