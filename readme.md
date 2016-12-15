# Jitesoft webpage.

Latest build on master:  
<img src="https://tc.jitesoft.com/app/rest/builds/buildType:(id:Web_TestsOnMaster)/statusIcon"/>

### Development setup.
The project uses docker and docker-compose for running all the services.  
There is two docker-compose files, one which is used in production and another one which is used to override 
the production file.  
  
To run the development environment use the following command:
```bash
> docker-compose -f docker-compose.yml -f dc-dev.yml -r
```
The `-r` argument can be omitted if you wish to keep the logs running in the shell.

The containers have volumes which are shared between host and container, so only when updating the docker-compose 
files should there be any need to restart them.  
Database is persisted and so are all logs.
  
When done working on the project, run
```bash
> docker-compose down
```
In the project directory to terminate the containers.


### Deployment.
When deploying, all that needs to be done is set a tag with the prefix `release-` in the master branch.  
Master is a closed branch, so to get the code base into it, the code should be deployed to staging.   
If it builds, it will be auto-merged by the build-bot.

### Development setup.
```
docker-compose up  
```
Done!

