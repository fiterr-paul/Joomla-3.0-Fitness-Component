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

include JPATH_COMPONENT_ADMINISTRATOR . DS . 'views' . DS . 'dashboard' . DS . 'tmpl' . DS . 'main_menu.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="span6" style="max-width: 550px;">
            <div class="well">
                <div class="row">
                    <div class="col-md-3">
                        <a class="dashboard_icon" id="clients_href" href="index.php?option=com_fitness&view=client_summary" title="Client Overview"></a>
                    </div>
                    <div class="col-md-3">
                        <a class="dashboard_icon" id="goals_href"  href="index.php?option=com_fitness&view=goals" title="Client Planning"></a>
                    </div>
                    <div class="col-md-3">
                        <a class="dashboard_icon" id="progress_href"  href="index.php?option=com_fitness&view=client_progress" title="Client Progress"></a>
                    </div>
                    <div class="col-md-3">
                        <a class="dashboard_icon" id="assessments_href"  href="index.php?option=com_fitness&view=assessments" title="Assessments"></a>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-3">
                        <a class="dashboard_icon" id="calendar_href" title="Calendar" href="index.php?option=com_multicalendar&view=admin&task=admin"></a>
                    </div>
                    <div class="col-md-3">
                        <a class="dashboard_icon" id="programs_href"  href="index.php?option=com_fitness&view=programs" title="Programs"></a>
                    </div>
                    <div class="col-md-3">
                        <a class="dashboard_icon" id="programs_tempates_href"  href="index.php?option=com_fitness&view=programs_templates" title="Program Templates"></a>
                    </div>
                    <div class="col-md-3">
                        <a class="dashboard_icon" id="exercise_href"  href="index.php?option=com_fitness&view=exercise_library" title="Exercise Library"></a>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-3">
                        <a class="dashboard_icon" id="nutrition_plans_href"  href="index.php?option=com_fitness&view=nutrition_plans" title="Nutrition Plans"></a>
                    </div>
                    <div class="col-md-3">
                        <a class="dashboard_icon" id="nutrition_diary_href"  href="index.php?option=com_fitness&view=nutrition_diaries" title="Nutrition Diary"></a>
                    </div>
                    <div class="col-md-3">
                        <a class="dashboard_icon" id="recipe_database_href"  href="index.php?option=com_fitness&view=nutrition_recipes" title="Recipe Database"></a>
                    </div>
                    <div class="col-md-3">
                        <a class="dashboard_icon" id="nutrition_database_href"  href="index.php?option=com_fitness&view=nutritiondatabases" title="Nutrition Database"></a>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-3">
                        <a class="dashboard_icon" id="profiles_href"  href="index.php?option=com_fitness&view=clients" title="Profiles"></a>
                    </div>
                    <div class="col-md-3">
                        <a class="dashboard_icon" id="settings_href"  href="index.php?option=com_fitness&view=settings" title="Settings"></a>
                    </div>
                    <div class="col-md-3">
                        <a class="dashboard_icon" id="add_new_client_href"  href="#" title="Add New Client"></a>
                    </div>
                    <div class="col-md-3">
                        <a class="dashboard_icon" id="add_new_trainer_href"  href="#" title="Add New Trainer"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="span5">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Notifications</h3>
                </div>
                <div class="panel-body">
                    Notifications body..
                </div>
            </div>
        </div>
    </div>
</div>
