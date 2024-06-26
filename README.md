## survey delivery automation

### overview
This application automates the delivery of survey links to administrators of specified domain names. It is developed using the Laravel framework and provides the following functionalities:

- **Endpoint**: The application has a POST `/api/survey` endpoint that accepts a JSON payload containing the survey URL and a list of domain names with their administrators' email addresses.
- **Data Validation**: Incoming data is validated to ensure it is correct and complete before processing.
- **Background Job Queuing**: Once validated, the application queues a background job to send an email to each domain administrator with the survey link. This ensures the application can handle large volumes of emails efficiently.
- **Email Delivery**: Emails are sent using SMTP for simplicity. However, the application is flexible and can be configured to use any queue and email provider through environment variables.
- **Logging**: Comprehensive logging is implemented to track each step of the process, including successful email deliveries and any errors that occur.

The application uses SQLite for simplicity but can be configured to use other database systems as needed.

## Instructions for Running the Program

1. **Clone the repository**:
2. **Install dependencies**:
    ```bash
    composer install
    ```

3. **Set up environment variables**:
    ```bash
    cp .env.example .env
    php artisan key:generate
    # Edit the .env file to configure your database and mail settings
    # Recommended: Use SQLite for simplicity. Create a `database.sqlite` file in the `database` directory.
    touch database/database.sqlite
    ```

4. **Run database migrations**:
    ```bash
    php artisan migrate
    ```

5. **Start the Laravel development server**:
    ```bash
    php artisan serve
    ```

6. **Run the queue worker**:
    ```bash
    php artisan queue:listen
    ```

7. **Send a POST request to the `/api/survey` endpoint** with the required JSON payload to trigger email sending.

## Dependencies

This application has no external dependencies and uses Laravel's built-in features. It requires only the necessary packages to run a Laravel 11 application. The main requirements are:

- PHP 8.2
- Laravel 11

A complete list of requirements can be found in the [Laravel documentation](https://laravel.com/docs/11.x/upgrade#updating-dependencies).

## Demo

1. **data validation**:
   ![Demo Image 1](/demo/1.png)
   ![Demo Image 2](/demo/2.png)

2. **logging**:
   ![Demo Image 3](/demo/3.png)

3. **email**:
   ![Demo Image 4](/demo/4.png)
