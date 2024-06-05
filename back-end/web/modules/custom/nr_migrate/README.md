# New Relic Task

The New Relic Task module facilitates the migration of data from a dummy API and provides a custom route to display users and their associated companies on a page.

## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Migration Instructions](#migration-instructions)
- [Usage](#usage)

## Requirements

This module depends on the following module:

- [Migrate Tools](https://www.drupal.org/project/migrate_tools)

## Installation

Install this module as you would normally install any contributed Drupal module. For detailed instructions, refer to the [Installing Drupal Modules](https://www.drupal.org/docs/extending-drupal/installing-drupal-modules) guide.

## Migration Instructions

To perform the migration:
### Via Migrate UI
1. Navigate to `/admin/structure/migrate`.
2. Run the "Migrate Company" migration first.
3. After successfully importing the Company content type, run the "Migrate User" migration.

### Via Drush
1. Migrate company content type using 
- ddev drush migrate:import nr_migrate_company
2. Migrate User content type
- ddev drush migrate:import nr_migrate_user

## Usage

To view the page displaying users and their companies, navigate to:

- `/admin/users/users-details`

### Note

This page is accessible to all user roles that have the 'access content' permission.
