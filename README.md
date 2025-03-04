
## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


##  How to Run the Project Using Docker

 This project uses Docker to containerize the application for easier deployment and consistent development environments.

##  Prerequisites

  . Docker installed on your machine

  .  Docker Compose installed

## Docker Setup Instructions

1. Clone the Repository

git clone https://github.com/your-repo/news-aggregator-api.git
cd news-aggregator-api

2. Environment Setup
Create a .env file in the project root directory and configure your environment variables.

3. Build Docker Images
Build the application and Nginx containers using Docker Compose:

docker-compose build

4. Run the Docker Containers
Start the application and Nginx services:

docker-compose up -d

5. The -d flag will run the containers in detached mode (background).

6. Access the Application
Open your browser and navigate to:

http://localhost:8000

7. Stop the Docker Containers
To stop the running containers, execute:

docker-compose down


##  Notes

Make sure Docker is running before executing any commands.
If you encounter permission issues, try running the commands with sudo on Linux systems.