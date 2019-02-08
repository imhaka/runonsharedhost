### Run On Php Shared Host Any App

#### How to use?
 Get method use for all request.
 
 For example: 
 
 * ##### Run Node app:
 
    * Download the favorite node version from this site http://nodejs.org/dist/
    * Extract the node-vxx.yy.zz.tar.gz  on your php host and change the name "node"
    * Use to below instruction   
  
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
