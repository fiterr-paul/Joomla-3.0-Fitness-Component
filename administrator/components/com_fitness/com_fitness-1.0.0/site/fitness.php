<?php
/**
 * @version     1.0.0
 * @package     com_fitness
 * @copyright   LIVE FIT LIVE LEAN PTY LTY © 2014. All rights reserved
 * @license     GNU General Public License
 * @author      Nikolay Korban <npkorban@mail.ru> - http://
 */

defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');

// Execute the task.
$controller	= JControllerLegacy::getInstance('Fitness');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
