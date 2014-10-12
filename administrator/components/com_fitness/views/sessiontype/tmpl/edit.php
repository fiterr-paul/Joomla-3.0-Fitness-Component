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

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_fitness/assets/css/fitness.css');
?>
<script type="text/javascript">
    js = jQuery.noConflict();
    js(document).ready(function() {
        
    });

    Joomla.submitbutton = function(task)
    {
        if (task == 'sessiontype.cancel') {
            Joomla.submitform(task, document.getElementById('sessiontype-form'));
        }
        else {
            
            if (task != 'sessiontype.cancel' && document.formvalidator.isValid(document.id('sessiontype-form'))) {
                
                Joomla.submitform(task, document.getElementById('sessiontype-form'));
            }
            else {
                alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
            }
        }
    }
</script>

<form action="<?php echo JRoute::_('index.php?option=com_fitness&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="sessiontype-form" class="form-validate">

    <div class="form-horizontal">
         <div class="row-fluid">
            <div class="span10 form-horizontal">
                <fieldset class="adminform">

                    	<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('name'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('name'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('category_id'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('category_id'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('state'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('state'); ?></div>
			</div>


                </fieldset>
            </div>
        </div>
        <?php echo JHtml::_('bootstrap.endTab'); ?>
        
        

        <?php echo JHtml::_('bootstrap.endTabSet'); ?>

        <input type="hidden" name="task" value="" />
        <?php echo JHtml::_('form.token'); ?>

    </div>
</form>