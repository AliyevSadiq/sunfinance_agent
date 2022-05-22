Installation
============

### Requirements
- Download **docker** and **docker-compose** binaries for initialization
- **make** executable

**Step 1:**
- Executing docker as regular user: **(only for linux)**

**Note:** If your docker executable already running by your user then, you can skip this step.

```shell
sudo groupadd docker
sudo usermod -aG docker ${USER}
su -s ${USER}

# For testing
docker --version
```

**Step 2:**
Copy .env.example file and rename to .env

**Step 3:**
Open a command console, enter your project directory and execute:

```console
$ make init     //for build and runnig docker containers
$ make app-init //for installing packages
$ make key-generate //generation key for .env file 
$ make app-migrate //for migration 
$ make doc-generate //for generating documentation
```

For running tests execute:

```console
$ make app-test
```
