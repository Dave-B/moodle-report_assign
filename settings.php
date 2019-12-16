<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Settings
 *
 * @package    report
 * @subpackage assign
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($hassiteconfig) {

    $settings = new admin_settingpage('report_assign_settings', new lang_string('pluginname', 'report_assign'));

    // Selector for submission fields.
    $submissionfields = [
        "status" => new lang_string('status'),
        "grade" => new lang_string('grade'),
        "gradevalue" => new lang_string('gradevalue', 'report_assign'),
        "grademax" => new lang_string('grademax', 'report_assign'),
        "grader" => new lang_string('grader', 'report_assign'),
        "created" => new lang_string('created', 'report_assign'),
        "modified" => new lang_string('modified'),
        "files" => new lang_string('files'),
        "extension" => new lang_string('extension', 'report_assign'),
    ];

    $settings->add(new admin_setting_configmulticheckbox(
            'report_assign/submissionfields',
            new lang_string('submissionfields', 'report_assign'),
            new lang_string('submissionfields_desc', 'report_assign'),
            ["status" => 1, "grade" => 1, "grader" => 1, "modified" => 1, "files" => 1, "extension" => 1],
            $submissionfields
    ));

    // Selector for user fields.
    $rawchoices = [
        'username',
        'email',
        'idnumber',
        'phone1',
        'phone2',
        'institution',
        'department',
        'address',
        'country',
        'lastip',
    ];
    $choices = [];
    foreach ($rawchoices as $choice) {
        $choices[$choice] = new lang_string($choice);
    }

    $settings->add(new admin_setting_configmulticheckbox(
        'report_assign/profilefields',
        new lang_string('profilefields', 'report_assign'),
        new lang_string('profilefields_desc', 'report_assign'),
        ['email' => 1, 'idnumber' => 1],
        $choices
    ));
}
