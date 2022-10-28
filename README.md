# INFUSEmedia test task

## Running 

```sh
docker-compose up -d 
chromium http://localhost:8080/index1.html
chromium http://localhost:8080/index2.html
# MySQL listens on localhost:13306, see results
mysql -h127.0.0.1 -p13306 -uvisits -ppassword infusemedia -e 'SELECT * FROM visits'
```

## Configuration

Start `php -S` from [www](www) and edit [.env](.env) to connect to a MySQL database outside of Docker environment