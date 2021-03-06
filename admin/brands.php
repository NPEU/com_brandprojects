<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_brands
 *
 * @copyright   Copyright (C) NPEU 2019.
 * @license     MIT License; see LICENSE.md
 */

defined('_JEXEC') or die;
JHtml::_('behavior.tabstate');

// Force-load the Admin language file to avoid repeating form language strings:
// (this model is used in the front-end too, and the Admin lang isn't auto-loaded there.)
/*$lang = JFactory::getLanguage();
$extension = 'com_brands';
$base_dir = JPATH_COMPONENT_ADMINISTRATOR;
$language_tag = 'en-GB';
$reload = true;
$lang->load($extension, $base_dir, $language_tag, $reload);*/

// Require helper file
JLoader::register('BrandsHelper', JPATH_COMPONENT . '/helpers/brands.php');

if (!JFactory::getUser()->authorise('core.manage', 'com_brands'))
{
    throw new JAccessExceptionNotallowed(JText::_('JERROR_ALERTNOAUTHOR'), 403);
}

$controller = JControllerLegacy::getInstance('Brands');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();

