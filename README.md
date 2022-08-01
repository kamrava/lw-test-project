# LW Test Project


## Getting Started
For running this project on your machine you need to have Docker installed.

## 1) Docker

To setup this project using Docker, first of all make sure `docker` and `docker-compose` is installed on your machine.

> Mac and Windows users do not need to install docker-compose separately

[Docker Installation](https://docs.docker.com/get-docker)

After docker installation you need to clone the repository to your local machine:

```
$ git clone https://github.com/kamrava/lw-test-project.git
```
Then `cd` to the project root directory:

```
$ cd lw-test-project
```

Copy the `.env.example` :

```
$ cp .env.example .env
```

Then you need to build docker containers as below:
```
$ docker-compose -f ./docker-compose.yml up --build -d
```

This command builds all required services as separated containers for you.

Now you need to login to the Docker container and run `composer install`:
```
$ docker exec -it leaseweb_app bash
```

Then run:
```
$ composer install
```

So server-side is ready.

For front-end side I recommend to run it outside of Docker.
Just go to `frontend` directory and run `yarn` as below:
```
$ cd frontend && yarn

$ quasar dev
```

There we go!


Now you can open website:

```
http://localhost:81
```

Cheers!