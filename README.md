
## Parent-Task
- We have two providers collect data from them in json files we need to read and make some filter operations on them to get the result

### Task Installation With Docker
- follow the instructions and run following commands
```
clone the repo and install docker decktop
```
```
cd Root App Directory
```
```
RUN docker build -t parent-task .
```
```
RUN docker run -p 8080:80 parent-task
```
- visit : http://localhost:8000

- you can see test cases by unit tests


```
RUN php artisan test 
```




