## Preventive Care Measure

This app help health care practitioners (Nurse/Doctors) to monitor whether their patients have complemeted some preventive care measures.

- Nurse Feature to manage manage patient record
- Admin feature to manage the app
- User feature to see when they have completed a preventive care measure and when (date.)

## Technology
This project was built with Laravel PHP and Livewire while PHPCS and PHPStan are setup and configured in the codebase as static analysis tool to ensure clean, good code quality and uniform standards across the codebase.

Test are written for Livewire components.

- To run test on the codebase locally, run the command *php artisan test*
- To run PHPCS configuration against the codebase locally, run the command *./vendor/bin/phpcs*
- To run PHPStan configuration against the codebase locally, run the command *./vendor/bin/phpstan analyse*


## Installation
- Clone the project to your local machine
- Run the command *composer install*
- Run the command *php artisan key:generate*
- If .env file diesn't exist, run the command *cp .env.example .env*
- In the .env file, update the necessary information to allow connection to a database
- Run the command *php artisan migrate*


The [HEROKU](#) link to view the project live.

