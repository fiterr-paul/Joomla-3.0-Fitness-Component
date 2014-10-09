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

?>
<div class="nav nav-pills">
  <a class="btn btn-primary btn-xs" role="button" href="index.php?option=com_fitness">Dashboard</a>
  <a class="btn btn-primary btn-xs" role="button" href="index.php?option=com_fitness&view=clients">Profiles</a>
  <a class="btn btn-primary btn-xs" role="button" href="index.php?option=com_fitness&view=client_summary">Overview</a>
  <a class="btn btn-primary btn-xs" role="button" href="index.php?option=com_fitness&view=goals">Goals & Panning</a>
  <a class="btn btn-primary btn-xs" role="button" href="index.php?option=com_fitness&view=client_progress">Client Progress</a>
  <a class="btn btn-primary btn-xs" role="button" href="index.php?option=com_fitness&view=assessments">Assessments</a>
  <a class="btn btn-primary btn-xs" role="button" href="index.php?option=com_multicalendar&view=admin&task=admin">Calendar</a>
  <a class="btn btn-primary btn-xs" role="button" href="index.php?option=com_fitness&view=programs">Programs</a>
  
  <a class="btn btn-primary btn-xs" role="button" href="index.php?option=com_fitness&view=programs_templates">Templates</a>
  <a class="btn btn-primary btn-xs" role="button" href="index.php?option=com_fitness&view=exercise_library">Exercise Library</a>
  <a class="btn btn-primary btn-xs" role="button" href="index.php?option=com_fitness&view=goals">Nutrition Plans</a>
  <a class="btn btn-primary btn-xs" role="button" href="index.php?option=com_fitness&view=nutrition_diaries">Nutrition Diaries</a>
  <a class="btn btn-primary btn-xs" role="button" href="index.php?option=com_fitness&view=nutrition_recipes">Recipes</a>
  <a class="btn btn-primary btn-xs" role="button" href="index.php?option=com_fitness&view=nutritiondatabases">Nutrition Database</a>
  
  <div class="dropdown btn-group">
    <button class="btn btn-primary btn-xs dropdown-toggle"   data-toggle="dropdown" href="#">
        Settings
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li><a class="" href="index.php?option=com_fitness&view=categories ">Appointments </a></li>
        <li><a class="" href="index.php?option=com_fitness&view=primarygoals">Primary Goals</a></li>
        <li><a class="" href="index.php?option=com_fitness&view=trainingperiods">Training Periods</a></li>
        <li><a class="" href="index.php?option=com_fitness&view=locations">Locations</a></li>
        <li><a class="" href="index.php?option=com_fitness&view=nutrition_focuses">Nutrition Focuses</a></li>
        
                
        <?php if(FitnessHelper::is_superuser()){ ?>
            <li><a class="" href="index.php?option=com_fitness&view=recipe_types">Recipe Types</a></li>
            <li><a class="" href="index.php?option=com_fitness&view=database_categories">Nutrition Database Categories</a></li>
            <li><a class="" href="index.php?option=com_fitness&view=user_groups">User Groups</a></li>
            <li><a class="" href="index.php?option=com_fitness&view=business_profiles">Business Profiles</a></li>
        
            <li><a class="" href="index.php?option=com_fitness&view=settings_exercise_types ">Exercise Type </a></li>
            <li><a class="" href="index.php?option=com_fitness&view=settings_force_types">Force Type</a></li>
            <li><a class="" href="index.php?option=com_fitness&view=settings_mechanics_types">Mechanics Type</a></li>
            <li><a class="" href="index.php?option=com_fitness&view=settings_body_parts">Body Part</a></li>
            <li><a class="" href="index.php?option=com_fitness&view=settings_target_muscles">Target Muscles </a></li>
            <li><a class="" href="index.php?option=com_fitness&view=settings_equipments">Equipment</a></li>
            <li><a class="" href="index.php?option=com_fitness&view=settings_difficulties">Difficulty</a></li>
        <?php } ?>
    </ul>
</div>
    
</div>





<div class="clr" style="margin-bottom:20px;"></div>
