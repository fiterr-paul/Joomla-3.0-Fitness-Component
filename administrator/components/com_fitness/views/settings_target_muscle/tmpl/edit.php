<?php
/**
 * @version     1.0.0
 * @package     com_fitness
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Nikolay Korban <niklug@ukr.net> - http://
 */
// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_fitness/assets/css/fitness.css');
?>
<script type="text/javascript">
    Joomla.submitbutton = function(task)
            {
                if (task == 'settings_target_muscle.cancel') {
                    Joomla.submitform(task, document.getElementById('settings_target_muscle-form'));
                }
                else{
                    
                    if (task != 'settings_target_muscle.cancel' && document.formvalidator.isValid(document.id('settings_target_muscle-form'))) {
                        
                        Joomla.submitform(task, document.getElementById('settings_target_muscle-form'));
                    }
                    else {
                        alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
                    }
                }
            }
</script>

<form action="<?php echo JRoute::_('index.php?option=com_fitness&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="settings_target_muscle-form" class="form-validate">
    <div class="form-horizontal">
        <div class="row-fluid">
            <div class="span10 form-horizontal">
                <fieldset class="adminform">
                    <div class="control-group">
                        <div class="control-label"><?php echo $this->form->getLabel('name'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('name'); ?></div>
                    </div>

                    <div class="control-group">
                        <div class="control-label"><?php echo $this->form->getLabel('state'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('state'); ?></div>
                    </div>

                    </ul>
                </fieldset>
            </div>
        </div>
    </div>

    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
    <div class="clr"></div>

    <style type="text/css">
        /* Temporary fix for drifting editor fields */
        .adminformlist li {
            clear: both;
        }
    </style>
</form>