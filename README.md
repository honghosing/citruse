# Citruse

A Laravel + Vue + PostgreSQL platform for managing purchase orders, stock, shipping, and distributor interactions for a fruit logistics business in Southern Africa.

---

## Setup Notes

### Commit: `Project Init + Docker Container Prebuild`

Initial project scaffold and container setup completed.

All commands below are run from inside the Docker container at:

`/var/www/`

### Setup Scripts

`./docker/setup/entry-point.sh`

Used to scaffold the Laravel application with Vue support:

#### laravel new --vue --phpunit html

`./docker/setup/runme.sh`

Restores local dependencies that are not committed to version control:

I built this docker kit a year ago but updated docker-compose.yml to 
- support postgreSQL
- added `runme.sh` for dependancies (please run this before use!)

