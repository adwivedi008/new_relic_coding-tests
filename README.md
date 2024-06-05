# Back End Drupal Coding Test

## Project Overview

This project involves importing data from a JSON endpoint into Drupal 10 as part of a backend coding assessment. The data will be mapped to two content types, "User" and "Company", and displayed on a custom route page.

## Prerequisites

- Docker Desktop
- DDEV

## Installation Instructions

### Setting Up Docker and DDEV

1. **Docker:** Follow the installation instructions at [Docker's official site](https://docs.docker.com/get-docker/).
2. **DDEV:** Follow the installation instructions at [DDEV's official site](https://ddev.readthedocs.io/en/stable/#installation).

### Project Setup

1. Fork the GitHub repository to your personal account.
2. Clone the repository to your local machine.
3. Navigate to the project directory:
    ```bash
    cd back-end
    ```
4. Start DDEV:
    ```bash
    ddev start
    ```
5. Install project dependencies using Composer:
    ```bash
    ddev composer install
    ```
6. Install Drupal site or import db:
    ```bash
    ddev drush site:install --account-name=admin --account-pass=admin -y
    ```
    ```bash
    ddev import-db --src=/path/to/your/dumpfile.sql
    ```
7. Enable the necessary migration modules (if new site is installed else do config import):
    ```bash
    ddev drush pm:enable migrate migrate_plus
    ```
    ```bash
    ddev cim
    ```
8. Launch the Drupal site:
    ```bash
    ddev launch
    ```
#### Note: For more details related to module read README.md module file.
 
### Stopping DDEV

To stop DDEV, run:
```bash
ddev poweroff
