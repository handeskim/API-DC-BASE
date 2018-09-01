<?php defined('BASEPATH') OR exit('No direct script access allowed');


$config['rest_default_format'] = 'json';
$config['rest_ip_whitelist'] = TRUE;

$config['rest_ip_blacklist_enabled'] = TRUE;

$config['rest_ip_blacklist'] = '';
$config['enable_emulate_request'] = TRUE;
$config['rest_realm'] = 'REST API';
$config['rest_auth'] = '';
$config['rest_valid_logins'] = array('admin' => '1234');
$config['rest_database_group'] = 'default';
$config['rest_keys_table'] = 'hitek_api_keys';
$config['rest_enable_keys'] = FALSE;
$config['rest_key_length'] = 40;
$config['rest_logs_table'] = 'jangin_api_logs';
$config['rest_enable_logging'] = FALSE;
$config['rest_limits_table'] = 'jangin_api_limits';
$config['rest_enable_limits'] = FALSE;
$config['rest_ignore_http_accept'] = FALSE;
$config['rest_ajax_only'] = FALSE;
$config['private_key'] = 'MIIJRAIBADANBgkqhkiG9w0BAQEFAASCCS4wggkqAgEAAoICAQCs4hvT5V6LXEql';
