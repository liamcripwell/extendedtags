<?php
/**
 * Connected Communities Initiative
 * Copyright (C) 2016  Queensland University of Technology
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

 use Yii;
 use yii\helpers\Url;
?>
<div class="panel panel-default">
    <div class="panel-heading"><strong>Tag</strong> Import</div>
    <div class="panel-body">
        <p>This module allows for extended management of user tags.</p>
        <hr/>
        <ul class="nav nav-pills">
            <li>
                <a href="<?php echo Url::toRoute('add'); ?>">Add Tags</a>
            </li>
            <li>
                <a href="<?php echo Url::toRoute('remove'); ?>">Remove Tags</a>
            </li>
            <li class="active">
                <a href="<?php echo Url::toRoute('import'); ?>">Import Tags</a>
            </li>
            <li>
                <a href="<?php echo Url::toRoute('survey'); ?>">Take Survey</a>
            </li>
        </ul>
        <hr/>

        <?php
        $flashes = Yii::$app->session->getAllFlashes();

        if(!empty($flashes)) {
            echo "<div class=\"well\">";
            echo "<h5>Errors</h5>";
            echo "<p>The input errors below should give you a hint as to what's going wrong.</p>";

            foreach($flashes as $key => $error) {
                echo $error;
            }

            echo "</div>";
        }
        ?>

        <h5><b>Successful Imports</b></h5>
        <table class="table">
        <?php
            if(count($validImports) > 0){
                foreach($validImports as $data) { ?>
                <tr>
                    <td><?php echo $data['tag']; ?></td>
                </tr>
            <?php }
            }else{ ?>
                <tr>
                    <td><?php echo "none"; ?></td>
                </tr>
        <?php } ?>
        </table>

        <h5><b>Failed Imports</b></h5>
        <table class="table">
        <?php
            if(count($invalidImports) > 0){
                foreach($invalidImports as $data) { ?>
                <tr>
                    <td><?php echo $data['tag']; ?></td>
                </tr>
            <?php }
            } else { ?>
                <tr>
                    <td><?php echo "none"; ?></td>
                </tr>
        <?php } ?>
        </table>


    </div>
</div>
