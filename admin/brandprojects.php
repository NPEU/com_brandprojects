<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_brandprojects
 *
 * @copyright   Copyright (C) NPEU 2019.
 * @license     MIT License; see LICENSE.md
 */

defined('_JEXEC') or die;
JHtml::_('behavior.tabstate');

// Force-load the Admin language file to avoid repeating form language strings:
// (this model is used in the front-end too, and the Admin lang isn't auto-loaded there.)
$lang = JFactory::getLanguage();
$extension = 'com_brandprojects';
$base_dir = JPATH_COMPONENT_ADMINISTRATOR;
$language_tag = 'en-GB';
$reload = true;
$lang->load($extension, $base_dir, $language_tag, $reload);

// Set some global property
#$document = JFactory::getDocument();
#$document->addStyleDeclaration('.icon-helloworld {background-image: url(../media/com_helloworld/images/tux-16x16.png);}');

// Require helper file
JLoader::register('BrandProjectsHelper', JPATH_COMPONENT . '/helpers/brandprojects.php');

// Get an instance of the controller prefixed by BrandProjects
$controller = JControllerLegacy::getInstance('BrandProjects');

// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
