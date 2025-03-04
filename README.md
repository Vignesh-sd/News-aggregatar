# News Aggregator API

## About the Project

This project is a News Aggregator API built with Laravel. It provides endpoints to manage and retrieve news articles from various sources.

## Prerequisites

- PHP (>=8.0)
- Composer
- Docker
- Docker Compose

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/your-repo/news-aggregator-api.git
   cd news-aggregator-api
   ```

2. Install dependencies:

   ```bash
   composer install
   ```

3. Create a `.env` file from the `.env.example` file and configure your environment variables.

4. Generate the application key:

   ```bash
   php artisan key:generate
   ```

## Database Migration

To create the database tables, run the following command:

```bash
php artisan migrate
```

## Running the Project

To start the project locally:

```bash
php artisan serve
```

The application will be accessible at `http://localhost:8000`.

## Schedule Jobs (Background Tasks)

To run scheduled jobs, use the following commands:

```bash
php artisan schedule:run
php artisan schedule:work
```

## How to Run the Project Using Docker

This project uses Docker to containerize the application for easier deployment and consistent development environments.

### Prerequisites

- Docker installed on your machine
- Docker Compose installed

### Docker Setup Instructions

1. **Clone the Repository**

   ```bash
   git clone https://github.com/your-repo/news-aggregator-api.git
   cd news-aggregator-api
   ```

2. **Environment Setup**

   Create a `.env` file in the project root directory and configure your environment variables.

3. **Build Docker Images**

   Build the application and Nginx containers using Docker Compose:

   ```bash
   docker-compose build
   ```

4. **Run the Docker Containers**

   Start the application and Nginx services:

   ```bash
   docker-compose up -d
   ```

   The `-d` flag will run the containers in detached mode (background).

5. **Access the Application**

   Open your browser and navigate to:

   [http://localhost:8000](http://localhost:8000)

6. **Stop the Docker Containers**

   To stop the running containers, execute:

   ```bash
   docker-compose down
   ```

### Notes

- Ensure Docker is running before executing any commands.
- If you encounter permission issues, try running the commands with `sudo` on Linux systems.

## API Documentation

API documentation is available via Swagger. Access the Swagger UI at:

[http://localhost:8000/api/documentation](http://localhost:8000/api/documentation)


### License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
