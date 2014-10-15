<?php
/**
 * @version     1.0.0
 * @package     com_fitness
 * @copyright   LIVE FIT LIVE LEAN PTY LTY © 2014. All rights reserved
 * @license     GNU General Public License
 * @author      Nikolay Korban <npkorban@mail.ru> - http://
 */
// no direct access
defined('_JEXEC') or die;
include JPATH_COMPONENT_ADMINISTRATOR . DS . 'views' . DS . 'dashboard' . DS . 'tmpl' . DS . 'main_menu.php';
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_fitness/assets/css/fitness.css');

$user = JFactory::getUser();
$userId = $user->get('id');
$listOrder = $this->state->get('list.ordering');
$listDirn = $this->state->get('list.direction');
$canOrder = $user->authorise('core.edit.state', 'com_fitness');
$saveOrder = $listOrder == 'a.ordering';
if ($saveOrder) {
    $saveOrderingUrl = 'index.php?option=com_fitness&task=sessiontypes.saveOrderAjax&tmpl=component';
    JHtml::_('sortablelist.sortable', 'sessiontypeList', 'adminForm', strtolower($listDirn), $saveOrderingUrl);
}
$sortFields = $this->getSortFields();
?>
<script type="text/javascript">
    Joomla.orderTable = function () {
        table = document.getElementById("sortTable");
        direction = document.getElementById("directionTable");
        order = table.options[table.selectedIndex].value;
        if (order != '<?php echo $listOrder; ?>') {
            dirn = 'asc';
        } else {
            dirn = direction.options[direction.selectedIndex].value;
        }
        Joomla.tableOrdering(order, dirn, '');
    }
</script>

<form action="<?php echo JRoute::_('index.php?option=com_fitness&view=sessiontypes'); ?>" method="post" name="adminForm" id="adminForm">
    <div  class="container-fluid well">
        <div  class="row-fluid form-inline" role="form">
                <input placeholder="Name" class="search-query" type="text" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('Search'); ?>" />
                <button class="btn btn-primary" type="submit"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
                <button class="btn btn-default" type="button" onclick="document.id('filter_search').value='';this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>

            <?php
            $db = JFactory::getDbo();
            $sql = "SELECT id, name FROM #__fitness_categories WHERE state='1'";
            $db->setQuery($sql);
            if (!$db->execute()) {
                JError::raiseError($db->getErrorMsg());
            }
            $categories = $db->loadObjectList();
            ?>


                <select name="filter_category" class="input-large" onchange="this.form.submit()">
                    <option value=""><?php echo JText::_('-Category-'); ?></option>
                    <?php echo JHtml::_('select.options', $categories, "id", "name", $this->state->get('filter.category'), true); ?>
                </select>


                <select name="filter_published" class="input-medium" onchange="this.form.submit()">
                    <option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED'); ?></option>
                    <?php echo JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), "value", "text", $this->state->get('filter.state'), true); ?>
                </select>
   
        </div>
    </div>
    
    <?php include JPATH_COMPONENT_ADMINISTRATOR . DS . 'views' . DS . 'dashboard' . DS . 'tmpl' . DS . 'left_menu.php'; ?>

<div id="j-main-container" class="well span10">
        <div class="clearfix"> </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <?php if (isset($this->items[0]->ordering)): ?>
                            <th width="1%" class="nowrap center hidden-phone">
                                <?php echo JHtml::_('grid.sort', '<i class="icon-menu-2"></i>', 'a.ordering', $listDirn, $listOrder, null, 'asc', 'JGRID_HEADING_ORDERING'); ?>
                            </th>
                        <?php endif; ?>
                        <th width="1%" class="hidden-phone">
                            <input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
                        </th>
                        
                        <th class='left'>
                            <?php echo JHtml::_('grid.sort', 'COM_FITNESS_SESSIONTYPES_NAME', 'a.name', $listDirn, $listOrder); ?>
                        </th>
                        <th class='left'>
                            <?php echo JHtml::_('grid.sort', 'COM_FITNESS_SESSIONTYPES_CATEGORY_ID', 'c.name', $listDirn, $listOrder); ?>
                        </th>
                        
                        <?php if (isset($this->items[0]->state)): ?>
                            <th width="1%" class="nowrap center">
                                <?php echo JHtml::_('grid.sort', 'JPUBLISHED', 'a.state', $listDirn, $listOrder); ?>
                            </th>
                        <?php endif; ?>


                        <?php if (isset($this->items[0]->id)): ?>
                            <th width="1%" class="nowrap center hidden-phone">
                                <?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
                            </th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tfoot>
                    <?php
                    if (isset($this->items[0])) {
                        $colspan = count(get_object_vars($this->items[0]));
                    } else {
                        $colspan = 10;
                    }
                    ?>
                    <tr>
                        <td colspan="<?php echo $colspan ?>">
                            <?php echo $this->pagination->getListFooter(); ?>
                        </td>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    foreach ($this->items as $i => $item) :
                        $ordering = ($listOrder == 'a.ordering');
                        $canCreate = $user->authorise('core.create', 'com_fitness');
                        $canEdit = $user->authorise('core.edit', 'com_fitness');
                        $canCheckin = $user->authorise('core.manage', 'com_fitness');
                        $canChange = $user->authorise('core.edit.state', 'com_fitness');
                        ?>
                        <tr class="row<?php echo $i % 2; ?>">

                            <?php if (isset($this->items[0]->ordering)): ?>
                                <td class="order nowrap center hidden-phone">
                                    <?php
                                    if ($canChange) :
                                        $disableClassName = '';
                                        $disabledLabel = '';
                                        if (!$saveOrder) :
                                            $disabledLabel = JText::_('JORDERINGDISABLED');
                                            $disableClassName = 'inactive tip-top';
                                        endif;
                                        ?>
                                        <span class="sortable-handler hasTooltip <?php echo $disableClassName ?>" title="<?php echo $disabledLabel ?>">
                                            <i class="icon-menu"></i>
                                        </span>
                                        <input type="text" style="display:none" name="order[]" size="5" value="<?php echo $item->ordering; ?>" class="width-20 text-area-order " />
                                    <?php else : ?>
                                        <span class="sortable-handler inactive" >
                                            <i class="icon-menu"></i>
                                        </span>
                                    <?php endif; ?>
                                </td>
                            <?php endif; ?>
                            <td class="hidden-phone">
                                <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                            </td>
                            
                            <td>
                                <?php if (isset($item->checked_out) && $item->checked_out) : ?>
                                    <?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'sessiontypes.', $canCheckin); ?>
                                <?php endif; ?>
                                <?php if ($canEdit) : ?>
                                    <a href="<?php echo JRoute::_('index.php?option=com_fitness&task=sessiontype.edit&id=' . (int) $item->id); ?>">
                                        <?php echo $this->escape($item->name); ?></a>
                                <?php else : ?>
                                    <?php echo $this->escape($item->name); ?>
                                <?php endif; ?>
                            </td>
                            <td>

                                <?php echo $item->category_name; ?>
                            </td>

                            <?php if (isset($this->items[0]->state)): ?>
                                <td class="center">
                                    <?php echo JHtml::_('jgrid.published', $item->state, $i, 'sessiontypes.', $canChange, 'cb'); ?>
                                </td>
                            <?php endif; ?>
                                
                            <?php if (isset($this->items[0]->id)): ?>
                                <td class="center hidden-phone">
                                    <?php echo (int) $item->id; ?>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <input type="hidden" name="task" value="" />
            <input type="hidden" name="boxchecked" value="0" />
            <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
            <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
            <?php echo JHtml::_('form.token'); ?>
        </div>
</form>        


