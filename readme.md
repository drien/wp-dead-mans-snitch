# WP Dead Man's Snitch #
**Contributors:** adelessert  
**Tags:** admin, monitoring, wp-cron, cron  
**Requires at least:** 4.2.0  
**Tested up to:** 4.3.0  
**Stable tag:** 0.1.0  
**License:** GPLv2 or later  
**License URI:** http://www.gnu.org/licenses/gpl-2.0.html  

Integrates with http://deadmanssnitch.com to notify you if your WP-Cron has stopped working.

## Description ##


WordPress's built in cron system is clever, but notoriously unreliable.
[Dead Man's Snitch](https://deadmanssnitch.com) is a great service for
monitoring any sort of scheduled task, and is a simple way to make sure
that your WordPress cron jobs are working properly. If WP-Cron isn't working
properly, WordPress might not be updating itself regularly, scheduled posts
may turn up late or not at all, and other features you count on might not work.

This plugin simply allows you to store your Snitch URL in the WordPress admin,
and requests it once per hour. If Dead Man's Snitch doesn't hear from WordPress
when it expects to, it'll send you an email notification.

## Installation ##

1. Upload `wp-deadmanssnitch` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Add your Snitch URL under Settings -> Dead Man's Snitch and set it 'Active'
1. Check your Dead Man's Snitch Dashboard to make sure it's working properly

## Changelog ##

### 0.1.0 ###
* Initial version

