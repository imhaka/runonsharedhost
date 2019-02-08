### Run On Php Shared Host Any App

#### How to use?
 Get method use for all request.
 
 * ##### Run Node app:
```rest 
GET example.com/index.php?server=node/bin/node&app=mqtt/index.js
```
* result: 

```json
{
    "pid": "2199255",
    "output": "starting mqtt application",
}
```

 * ##### List all PID

```rest
GET  example.com/index.php?listpid
```

* result:

```json
{
    "pids": [
    "2199255  : node/bin/node mqtt/index.js >log/log1349610073.txt 2>&1 & echo $!" ]
}
```

* ##### Kill app to use pid

```rest 
GET  example.com/index.php?kill=2199255
```

* result:

 ```json
{
    "pid": "2199255",
    "output": null
}
```
