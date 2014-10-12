<?php

/**
 * @version     1.0.0
 * @package     com_fitness
 * @copyright   LIVE FIT LIVE LEAN PTY LTY © 2014. All rights reserved
 * @license     GNU General Public License
 * @author      Nikolay Korban <npkorban@mail.ru> - http://
 */
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for a list of Fitness.
 */
class FitnessViewSessiontypes extends JViewLegacy {

    protected $items;
    protected $pagination;
    protected $state;

    /**
     * Display the view
     */
    public function display($tpl = null) {
        $this->state = $this->get('State');
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        FitnessHelper::addSubmenu('sessiontypes');

        $this->addToolbar();

        $this->sidebar = JHtmlSidebar::render();
        parent::display($tpl);
    }

    /**
     * Add the page title and toolbar.
     *
     * @since	1.6
     */
    protected function addToolbar() {
        require_once JPATH_COMPONENT . '/helpers/fitness.php';

        $state = $this->get('State');
        $canDo = FitnessHelper::getActions($state->get('filter.category_id'));

        JToolBarHelper::title(JText::_('COM_FITNESS_TITLE_SESSIONTYPES'), 'sessiontypes.png');

        //Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_COMPONENT_ADMINISTRATOR . '/views/sessiontype';
        if (file_exists($formPath)) {

            if ($canDo->get('core.create')) {
                JToolBarHelper::addNew('sessiontype.add', 'JTOOLBAR_NEW');
            }

            if ($canDo->get('core.edit') && isset($this->items[0])) {
                JToolBarHelper::editList('sessiontype.edit', 'JTOOLBAR_EDIT');
            }
        }

        if ($canDo->get('core.edit.state')) {

            if (isset($this->items[0]->state)) {
                JToolBarHelper::divider();
                JToolBarHelper::custom('sessiontypes.publish', 'publish.png', 'publish_f2.png', 'JTOOLBAR_PUBLISH', true);
                JToolBarHelper::custom('sessiontypes.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
            } else if (isset($this->items[0])) {
                //If this component does not use state then show a direct delete button as we can not trash
                JToolBarHelper::deleteList('', 'sessiontypes.delete', 'JTOOLBAR_DELETE');
            }

            if (isset($this->items[0]->state)) {
                JToolBarHelper::divider();
                JToolBarHelper::archiveList('sessiontypes.archive', 'JTOOLBAR_ARCHIVE');
            }
            if (isset($this->items[0]->checked_out)) {
                JToolBarHelper::custom('sessiontypes.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
            }
        }

        //Show trash and delete for components that uses the state field
        if (isset($this->items[0]->state)) {
            if ($state->get('filter.state') == -2 && $canDo->get('core.delete')) {
                JToolBarHelper::deleteList('', 'sessiontypes.delete', 'JTOOLBAR_EMPTY_TRASH');
                JToolBarHelper::divider();
            } else if ($canDo->get('core.edit.state')) {
                JToolBarHelper::trash('sessiontypes.trash', 'JTOOLBAR_TRASH');
                JToolBarHelper::divider();
            }
        }

        if ($canDo->get('core.admin')) {
            JToolBarHelper::preferences('com_fitness');
        }

        //Set sidebar action - New in 3.0
        JHtmlSidebar::setAction('index.php?option=com_fitness&view=sessiontypes');

        $this->extra_sidebar = '';
        
        JHtmlSidebar::addFilter(

                JText::_('JOPTION_SELECT_PUBLISHED'),

                'filter_published',

                JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), "value", "text", $this->state->get('filter.state'), true)

        );
        

        $db = JFactory::getDbo();
        $sql = "SELECT id, name FROM #__fitness_categories WHERE state='1'";
        $db->setQuery($sql);
        if(!$db->query()) {
            JError::raiseError($db->getErrorMsg());
        }
        $categories = $db->loadObjectList();
        

        JHtmlSidebar::addFilter(

                JText::_('-Parent Category-'),

                'filter_category',

                JHtml::_('select.options', $categories, "id", "name", $this->state->get('filter.category'), true)

        );

    }

	protected function getSortFields()
	{
		return array(
		'a.id' => JText::_('JGRID_HEADING_ID'),
		'a.name' => JText::_('COM_FITNESS_SESSIONTYPES_NAME'),
		'a.category_id' => JText::_('COM_FITNESS_SESSIONTYPES_CATEGORY_ID'),
		'a.state' => JText::_('JSTATUS'),
		);
	}

}
