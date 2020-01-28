---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_4a6a89e9e0eaea9c72ceea57315f2c42 -->
## Auth

> Example request:

```bash
curl -X POST \
    "http://localhost/api/authenticate" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/authenticate"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/authenticate`


<!-- END_4a6a89e9e0eaea9c72ceea57315f2c42 -->

<!-- START_61739f3220a224b34228600649230ad1 -->
## Logout function

> Example request:

```bash
curl -X POST \
    "http://localhost/api/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/logout`


<!-- END_61739f3220a224b34228600649230ad1 -->

<!-- START_79a5d6a9904c108108249ddbb379adb1 -->
## Store a newly created resource in storage.

require: name, surname, email, address, phone, password

> Example request:

```bash
curl -X POST \
    "http://localhost/api/user/store-customer" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/store-customer"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/user/store-customer`


<!-- END_79a5d6a9904c108108249ddbb379adb1 -->

<!-- START_02770c83122025e480cd544caecc36f5 -->
## Update online order

> Example request:

```bash
curl -X POST \
    "http://localhost/api/order/online/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/order/online/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/order/online/update`


<!-- END_02770c83122025e480cd544caecc36f5 -->

<!-- START_4f66d638ceaa1d5b4790b3e59c589d58 -->
## Create new online order

> Example request:

```bash
curl -X POST \
    "http://localhost/api/order/online" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/order/online"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/order/online`


<!-- END_4f66d638ceaa1d5b4790b3e59c589d58 -->

<!-- START_4fcb6a5c3ed694eed2425f3c2a74457f -->
## Show of order

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/order/show/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/order/show/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
"Wystąpił nieoczekiwany błąd"
```

### HTTP Request
`GET api/order/show/{orderToken}`


<!-- END_4fcb6a5c3ed694eed2425f3c2a74457f -->

<!-- START_c8059b2e53c3b54b3be70262b8686d13 -->
## Show info of user

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/user/auth-user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/auth-user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
"unauthenticated"
```

### HTTP Request
`GET api/user/auth-user`


<!-- END_c8059b2e53c3b54b3be70262b8686d13 -->

<!-- START_82c4837c7d426c03b9e68a033ff0762c -->
## Delete Ordere

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/order/delete/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/order/delete/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/order/delete/{orderToken}`


<!-- END_82c4837c7d426c03b9e68a033ff0762c -->

<!-- START_30a7ad44c4383c85c240df8f76cd8c54 -->
## Add feedback

> Example request:

```bash
curl -X POST \
    "http://localhost/api/contact" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/contact"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/contact`


<!-- END_30a7ad44c4383c85c240df8f76cd8c54 -->

<!-- START_9992fa5153dfbad664a75753c2fdca13 -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/table" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/table"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/table`


<!-- END_9992fa5153dfbad664a75753c2fdca13 -->

<!-- START_c05b853d28f776b4d095b5e1422aa529 -->
## Load table data

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/table/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/table/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/table/{table}`


<!-- END_c05b853d28f776b4d095b5e1422aa529 -->

<!-- START_ef2866b3208943b2d450c559406e80ae -->
## Show for waiter

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/table/waiter/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/table/waiter/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/table/waiter/{table}`


<!-- END_ef2866b3208943b2d450c559406e80ae -->

<!-- START_a5daa620ef75cf21c7eae3cf4ad23e3e -->
## Create new table

> Example request:

```bash
curl -X POST \
    "http://localhost/api/table" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/table"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/table`


<!-- END_a5daa620ef75cf21c7eae3cf4ad23e3e -->

<!-- START_da6324d440d8af5d3519aeb53592b978 -->
## Update table parm

> Example request:

```bash
curl -X POST \
    "http://localhost/api/table/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/table/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/table/update`


<!-- END_da6324d440d8af5d3519aeb53592b978 -->

<!-- START_1d9ea605dda76a733e2324f4047bc019 -->
## Delete table

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/table/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/table/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/table/{table}`


<!-- END_1d9ea605dda76a733e2324f4047bc019 -->

<!-- START_a728576b5403387c9cbbf50ff2e019db -->
## Return array of tables served by current logged user

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/my-tables" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/my-tables"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/my-tables`


<!-- END_a728576b5403387c9cbbf50ff2e019db -->

<!-- START_597dc2a2bca52a5de4905e87a45d8c96 -->
## Open table

> Example request:

```bash
curl -X POST \
    "http://localhost/api/table/1/open" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/table/1/open"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/table/{table}/open`


<!-- END_597dc2a2bca52a5de4905e87a45d8c96 -->

<!-- START_99f4465d17e1890d54c96c75b214189a -->
## Close table

> Example request:

```bash
curl -X POST \
    "http://localhost/api/table/1/close" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/table/1/close"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/table/{table}/close`


<!-- END_99f4465d17e1890d54c96c75b214189a -->

<!-- START_9dde900f2d46605e51b276f998b9d808 -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/dish" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/dish"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/dish`


<!-- END_9dde900f2d46605e51b276f998b9d808 -->

<!-- START_67719552416de0b06174bbb6aec55960 -->
## Load dish data

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/dish/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/dish/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/dish/{dish}`


<!-- END_67719552416de0b06174bbb6aec55960 -->

<!-- START_dff84e0b08e883a54928103c395017b8 -->
## Create new dish

> Example request:

```bash
curl -X POST \
    "http://localhost/api/dish" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/dish"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/dish`


<!-- END_dff84e0b08e883a54928103c395017b8 -->

<!-- START_05e34d501b1032e37e8786998580bc02 -->
## Store new photo

> Example request:

```bash
curl -X POST \
    "http://localhost/api/dish/photo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/dish/photo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/dish/photo`


<!-- END_05e34d501b1032e37e8786998580bc02 -->

<!-- START_34bee50ce8a786d619ad40487b5cd1d6 -->
## Delete photo

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/dish/photo/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/dish/photo/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/dish/photo/{id}`


<!-- END_34bee50ce8a786d619ad40487b5cd1d6 -->

<!-- START_daec12a6c9c9778ea5ef24d1e48ac876 -->
## Update new dish

> Example request:

```bash
curl -X POST \
    "http://localhost/api/dish/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/dish/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/dish/update`


<!-- END_daec12a6c9c9778ea5ef24d1e48ac876 -->

<!-- START_99cfed514e3f483efe521df978564856 -->
## Delete dish

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/dish/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/dish/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/dish/{dish}`


<!-- END_99cfed514e3f483efe521df978564856 -->

<!-- START_591dd0a3e1c1d2850d19623aac9aa872 -->
## Remove photo from dish

> Example request:

```bash
curl -X POST \
    "http://localhost/api/dish/remove-photo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/dish/remove-photo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/dish/remove-photo`


<!-- END_591dd0a3e1c1d2850d19623aac9aa872 -->

<!-- START_5a74dfa1699913c0c69d304d2e1dcf5b -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/dishCategory" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/dishCategory"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/dishCategory`


<!-- END_5a74dfa1699913c0c69d304d2e1dcf5b -->

<!-- START_073a09beab83012f6b2e71af2aa36ecb -->
## Create new category

> Example request:

```bash
curl -X POST \
    "http://localhost/api/dishCategory" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/dishCategory"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/dishCategory`


<!-- END_073a09beab83012f6b2e71af2aa36ecb -->

<!-- START_31ca59078c02b0d80f379f7248476fe8 -->
## Update new category

> Example request:

```bash
curl -X POST \
    "http://localhost/api/dishCategory/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/dishCategory/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/dishCategory/update`


<!-- END_31ca59078c02b0d80f379f7248476fe8 -->

<!-- START_f4056559a49072afbca3f7b10f4543db -->
## Delete category

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/dishCategory/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/dishCategory/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/dishCategory/{dishCategory}`


<!-- END_f4056559a49072afbca3f7b10f4543db -->

<!-- START_cc9ed279a44a33c46165192a122c28dc -->
## All where user_id = auth::id()

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/myFavourite" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/myFavourite"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/myFavourite`


<!-- END_cc9ed279a44a33c46165192a122c28dc -->

<!-- START_a8150ccd1bed81778c15b1e4d7cd0c82 -->
## All where user_id = auth::id()

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/favouriteDish" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/favouriteDish"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/favouriteDish`


<!-- END_a8150ccd1bed81778c15b1e4d7cd0c82 -->

<!-- START_c6bbb61d7d88e3adb8ff649f2129333c -->
## Adding dish to list of favourite

> Example request:

```bash
curl -X POST \
    "http://localhost/api/favouriteDish/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/favouriteDish/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/favouriteDish/create`


<!-- END_c6bbb61d7d88e3adb8ff649f2129333c -->

<!-- START_67db03f81936b92cac14b1b123630bd1 -->
## Delete dish from list of favourite

> Example request:

```bash
curl -X POST \
    "http://localhost/api/favouriteDish/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/favouriteDish/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/favouriteDish/delete`


<!-- END_67db03f81936b92cac14b1b123630bd1 -->

<!-- START_bff7813984c3d602400875db8926483e -->
## To change status of order

> Example request:

```bash
curl -X POST \
    "http://localhost/api/order/status" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/order/status"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/order/status`


<!-- END_bff7813984c3d602400875db8926483e -->

<!-- START_ef5e1596d66e4020398384b166d88667 -->
## Get possible order status types

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/order/status-types" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/order/status-types"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/order/status-types`


<!-- END_ef5e1596d66e4020398384b166d88667 -->

<!-- START_a8b222e34200f1f913df3df5898ef609 -->
## All open order with worker_id = auth::id()

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/order/my-order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/order/my-order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/order/my-order`


<!-- END_a8b222e34200f1f913df3df5898ef609 -->

<!-- START_143064c8696f065e293b51c4142b3979 -->
## All orders customer_id = auth::id()

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/order/customer-index" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/order/customer-index"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/order/customer-index`


<!-- END_143064c8696f065e293b51c4142b3979 -->

<!-- START_8bbb845bb896dfa49743b2c297887888 -->
## All open order with given status

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/order/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/order/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/order/{type}`


<!-- END_8bbb845bb896dfa49743b2c297887888 -->

<!-- START_f3142a0ea629812963a7f59882967d1e -->
## Create new order as worker

> Example request:

```bash
curl -X POST \
    "http://localhost/api/order/worker" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/order/worker"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/order/worker`


<!-- END_f3142a0ea629812963a7f59882967d1e -->

<!-- START_0607b2fadd5c24832de046e05586a134 -->
## Update order from worker

> Example request:

```bash
curl -X POST \
    "http://localhost/api/order/worker/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/order/worker/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/order/worker/update`


<!-- END_0607b2fadd5c24832de046e05586a134 -->

<!-- START_3fa3ade7e1ef271d6293280392dba088 -->
## Add discount

> Example request:

```bash
curl -X POST \
    "http://localhost/api/voucher/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/voucher/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/voucher/create`


<!-- END_3fa3ade7e1ef271d6293280392dba088 -->

<!-- START_b233fe2a4896daaefbe225a0fb78506c -->
## Add discount to existing order

> Example request:

```bash
curl -X POST \
    "http://localhost/api/voucher/use" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/voucher/use"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/voucher/use`


<!-- END_b233fe2a4896daaefbe225a0fb78506c -->

<!-- START_3dd6013d0e0316d0beb67e652b650889 -->
## store reservation as customer

> Example request:

```bash
curl -X POST \
    "http://localhost/api/reservation/store-as-customer" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/reservation/store-as-customer"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/reservation/store-as-customer`


<!-- END_3dd6013d0e0316d0beb67e652b650889 -->

<!-- START_76b2a4d5b433a66343c886acf9dc30eb -->
## store reservation as worker

> Example request:

```bash
curl -X POST \
    "http://localhost/api/reservation/store-as-worker" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/reservation/store-as-worker"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/reservation/store-as-worker`


<!-- END_76b2a4d5b433a66343c886acf9dc30eb -->

<!-- START_0de6fea42cb6a8b8d2833c109925b102 -->
## Load reservation date

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/reservation/show/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/reservation/show/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/reservation/show/{id}`


<!-- END_0de6fea42cb6a8b8d2833c109925b102 -->

<!-- START_274ee5070eb05be4a6733d6d7288727c -->
## Load reservation date

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/reservation/show-user/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/reservation/show-user/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/reservation/show-user/{id}`


<!-- END_274ee5070eb05be4a6733d6d7288727c -->

<!-- START_44cafa4ec23ce90e7d2e37a35512a1c1 -->
## show reservation for customer

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/reservation/customer-index" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/reservation/customer-index"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/reservation/customer-index`


<!-- END_44cafa4ec23ce90e7d2e37a35512a1c1 -->

<!-- START_30cfb7dbd718a66abcad04fac4fdf37c -->
## show reservation for worker

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/reservation/worker-index/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/reservation/worker-index/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/reservation/worker-index/{date}`


<!-- END_30cfb7dbd718a66abcad04fac4fdf37c -->

<!-- START_5d0e45b862b6568ed365cebbe15103d3 -->
## Find free table for given date

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/reservation/tables/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/reservation/tables/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/reservation/tables/{date}`


<!-- END_5d0e45b862b6568ed365cebbe15103d3 -->

<!-- START_d0069c5bdd0f97c5fe1419944b13f7b5 -->
## Delete reservation

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/reservation/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/reservation/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/reservation/{id}`


<!-- END_d0069c5bdd0f97c5fe1419944b13f7b5 -->

<!-- START_2152d7b68da2b53a355e8954537192ba -->
## Return free tables

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/order/tables/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/order/tables/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/order/tables/{date}`


<!-- END_2152d7b68da2b53a355e8954537192ba -->

<!-- START_b116cd84abafafcb0e320dee1f93e3fd -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/user/fetch-user/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/fetch-user/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/user/fetch-user/{user}`


<!-- END_b116cd84abafafcb0e320dee1f93e3fd -->

<!-- START_624efd6e6831ee7fba8cddb3fb44eb3a -->
## Show customers

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/user/fetch-customers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/fetch-customers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/user/fetch-customers`


<!-- END_624efd6e6831ee7fba8cddb3fb44eb3a -->

<!-- START_68f12a24b38ba6abe41b3bf61ac42e41 -->
## Show workers

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/user/fetch-workers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/fetch-workers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/user/fetch-workers`


<!-- END_68f12a24b38ba6abe41b3bf61ac42e41 -->

<!-- START_ac07f16e07df94478413a36bba884a5e -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/user/fetch-user-my-account/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/fetch-user-my-account/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/user/fetch-user-my-account/{user}`


<!-- END_ac07f16e07df94478413a36bba884a5e -->

<!-- START_de692bba391adf35abe503e9405bc377 -->
## Change users password
require: oldPassword, newPassword, newPasswordRepeated

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/user/change-password/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/change-password/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/user/change-password/{user}`


<!-- END_de692bba391adf35abe503e9405bc377 -->

<!-- START_947ef659515777a0da61df05a55c853f -->
## Change users password
require: oldPassword, newPassword, newPasswordRepeated

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/user/change-password-my-account/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/change-password-my-account/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/user/change-password-my-account/{user}`


<!-- END_947ef659515777a0da61df05a55c853f -->

<!-- START_0e06baad90a9cb6196e3d8622f5dda9c -->
## Update user

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/user/update-my-account/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/update-my-account/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/user/update-my-account/{user}`


<!-- END_0e06baad90a9cb6196e3d8622f5dda9c -->

<!-- START_346e5de77bdc0a0ece1b5778b38a9609 -->
## Update user

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/user/update-worker/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/update-worker/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/user/update-worker/{user}`


<!-- END_346e5de77bdc0a0ece1b5778b38a9609 -->

<!-- START_0b02a96fe3ecb64ff2e9f684e6097249 -->
## Update user

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/user/update-customer/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/update-customer/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/user/update-customer/{user}`


<!-- END_0b02a96fe3ecb64ff2e9f684e6097249 -->

<!-- START_8f79b68cb927e452df9e5cf21ac9e63b -->
## Store a newly created resource in storage.

require: name, surname, email, address, phone, password

> Example request:

```bash
curl -X POST \
    "http://localhost/api/user/store-worker" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/store-worker"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/user/store-worker`


<!-- END_8f79b68cb927e452df9e5cf21ac9e63b -->

<!-- START_a1ef15db35f08591deb485d3c5fb9a31 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/user/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/user/{id}`


<!-- END_a1ef15db35f08591deb485d3c5fb9a31 -->

<!-- START_89f18f1a4cfb391dc98217fe7aab14cd -->
## All where with user_id = auth::id()

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/user/vouchers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/vouchers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/user/vouchers`


<!-- END_89f18f1a4cfb391dc98217fe7aab14cd -->

<!-- START_7826b97784194db30890a636959ff686 -->
## Generate years statistics

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/statistics/year/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/statistics/year/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/statistics/year/{year}`


<!-- END_7826b97784194db30890a636959ff686 -->

<!-- START_99d581de7443b5662e1f3f7549f421d4 -->
## Generate waiter statistics

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/statistics/waiter/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/statistics/waiter/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/statistics/waiter/{year}/{id}`


<!-- END_99d581de7443b5662e1f3f7549f421d4 -->

<!-- START_32daf744b6bca059029e5852b22bc26f -->
## Generate years waiter statistics

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/statistics/waiter/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/statistics/waiter/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/statistics/waiter/{year}`


<!-- END_32daf744b6bca059029e5852b22bc26f -->

<!-- START_00b84afebf1ee178b13041b073f1d374 -->
## api/statistics/customer/{year}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/statistics/customer/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/statistics/customer/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/statistics/customer/{year}`


<!-- END_00b84afebf1ee178b13041b073f1d374 -->

<!-- START_ef908a6ceb7a6afce00cf9b8d39c2387 -->
## All customer statistic in given period

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/statistics/customer-interval/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/statistics/customer-interval/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/statistics/customer-interval/{from}/{to}`


<!-- END_ef908a6ceb7a6afce00cf9b8d39c2387 -->

<!-- START_b801cd298efe360bfdb88efecc778a92 -->
## Show favourite dishes statisitcs

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/statistics/favourite-dishes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/statistics/favourite-dishes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/statistics/favourite-dishes`


<!-- END_b801cd298efe360bfdb88efecc778a92 -->

<!-- START_b7d2db06cc1dde3c5c7f05d72412964e -->
## Show the restaurant menuLayouts for customer

> Example request:

```bash
curl -X GET \
    -G "http://localhost/menu" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/menu"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET menu`


<!-- END_b7d2db06cc1dde3c5c7f05d72412964e -->

<!-- START_679ea4e19d49028fd5a7bd6ee9f0f308 -->
## Show contact form

> Example request:

```bash
curl -X GET \
    -G "http://localhost/contact" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/contact"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET contact`


<!-- END_679ea4e19d49028fd5a7bd6ee9f0f308 -->

<!-- START_ad8fb46705634bab5d804eea0c6b3153 -->
## Show form for create order

> Example request:

```bash
curl -X GET \
    -G "http://localhost/order/online" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/order/online"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET order/online`


<!-- END_ad8fb46705634bab5d804eea0c6b3153 -->

<!-- START_2e88b31c92730ef9b6a9ffe66c0a6690 -->
## Show form for display specific order

> Example request:

```bash
curl -X GET \
    -G "http://localhost/order-show/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/order-show/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET order-show/{orderToken}`


<!-- END_2e88b31c92730ef9b6a9ffe66c0a6690 -->

<!-- START_53be1e9e10a08458929a2e0ea70ddb86 -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET /`


<!-- END_53be1e9e10a08458929a2e0ea70ddb86 -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## login
> Example request:

```bash
curl -X POST \
    "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out (Invalidate the token).

> Example request:

```bash
curl -X POST \
    "http://localhost/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## password/reset
> Example request:

```bash
curl -X GET \
    -G "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## password/email
> Example request:

```bash
curl -X POST \
    "http://localhost/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## password/reset/{token}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## password/reset
> Example request:

```bash
curl -X POST \
    "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_cfc03dbd5bf64af9db5a2f12c58fce63 -->
## Show form for all tables in restaurant

> Example request:

```bash
curl -X GET \
    -G "http://localhost/table-admin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/table-admin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET table-admin`


<!-- END_cfc03dbd5bf64af9db5a2f12c58fce63 -->

<!-- START_5dd0b16a4ee947f667d2c0621bf49b7a -->
## Show form for edit specific table

> Example request:

```bash
curl -X GET \
    -G "http://localhost/table/edit/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/table/edit/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET table/edit/{id}`


<!-- END_5dd0b16a4ee947f667d2c0621bf49b7a -->

<!-- START_4ea692d877c18bf143671a110e1bd13e -->
## Show form for display specific table for admin

> Example request:

```bash
curl -X GET \
    -G "http://localhost/table/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/table/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET table/{id}`


<!-- END_4ea692d877c18bf143671a110e1bd13e -->

<!-- START_bbebc231623ea87b3fc173520a5cb4ab -->
## Show form for display tables for currently logged waiter

> Example request:

```bash
curl -X GET \
    -G "http://localhost/table-waiter/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/table-waiter/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET table-waiter/{id}`


<!-- END_bbebc231623ea87b3fc173520a5cb4ab -->

<!-- START_b02a9d20642b31841739c8fefbf2fa76 -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/dish" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/dish"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET dish`


<!-- END_b02a9d20642b31841739c8fefbf2fa76 -->

<!-- START_c301b08e9e5f993ca1acb9c714c36d3a -->
## Show the form for favourite dishes list.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/myFavouriteDishes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/myFavouriteDishes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET myFavouriteDishes`


<!-- END_c301b08e9e5f993ca1acb9c714c36d3a -->

<!-- START_ccdc7b1b844db3733bbfb1ff3cd38c3c -->
## Show the restaurant menuLayouts for admin

> Example request:

```bash
curl -X GET \
    -G "http://localhost/menu-admin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/menu-admin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET menu-admin`


<!-- END_ccdc7b1b844db3733bbfb1ff3cd38c3c -->

<!-- START_4221b4d3c0d2334e8a8d2eff096e682f -->
## Show the form for editing the dish

> Example request:

```bash
curl -X GET \
    -G "http://localhost/dish/edit/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/dish/edit/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET dish/edit/{id}`


<!-- END_4221b4d3c0d2334e8a8d2eff096e682f -->

<!-- START_5ca17cd2b6deae1adc8a743048739540 -->
## Show form for all dish categories

> Example request:

```bash
curl -X GET \
    -G "http://localhost/dishCategory" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/dishCategory"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET dishCategory`


<!-- END_5ca17cd2b6deae1adc8a743048739540 -->

<!-- START_180614e7d7bf2d848f4cdb70c8f5eb05 -->
## Show form t create reservation by waiter

> Example request:

```bash
curl -X GET \
    -G "http://localhost/reservation/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/reservation/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET reservation/create`


<!-- END_180614e7d7bf2d848f4cdb70c8f5eb05 -->

<!-- START_0f9388740b66ebbdd41ab2f63ed799e9 -->
## Show form of all currently logged user reservations

> Example request:

```bash
curl -X GET \
    -G "http://localhost/reservation/user-index" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/reservation/user-index"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET reservation/user-index`


<!-- END_0f9388740b66ebbdd41ab2f63ed799e9 -->

<!-- START_2359a009b5e80a7aa2138aa4ec979ef4 -->
## Show form for create reservation by user

> Example request:

```bash
curl -X GET \
    -G "http://localhost/reservation/create-user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/reservation/create-user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET reservation/create-user`


<!-- END_2359a009b5e80a7aa2138aa4ec979ef4 -->

<!-- START_56f4bbf72574479a2b10c5602aa5b049 -->
## Show form contains all reservations for currently logged waiter

> Example request:

```bash
curl -X GET \
    -G "http://localhost/reservation/index" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/reservation/index"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET reservation/index`


<!-- END_56f4bbf72574479a2b10c5602aa5b049 -->

<!-- START_17b3d70c4d5ac4510ba7bb752e6e9fee -->
## Show form for display information about specific reservation for user

> Example request:

```bash
curl -X GET \
    -G "http://localhost/reservation/user-show/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/reservation/user-show/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET reservation/user-show/{id}`


<!-- END_17b3d70c4d5ac4510ba7bb752e6e9fee -->

<!-- START_d8ba8e3b4cc5ad4d2bb308302d70ab55 -->
## Show form for display information about specific reservation for waiter

> Example request:

```bash
curl -X GET \
    -G "http://localhost/reservation/show/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/reservation/show/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET reservation/show/{id}`


<!-- END_d8ba8e3b4cc5ad4d2bb308302d70ab55 -->

<!-- START_7acc1a863991acac111b50476059769f -->
## Show the form for create dish

> Example request:

```bash
curl -X GET \
    -G "http://localhost/dish/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/dish/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET dish/create`


<!-- END_7acc1a863991acac111b50476059769f -->

<!-- START_b993d58523b3a10137a63c6986ce4f40 -->
## Show form for display my account for currently logged user

> Example request:

```bash
curl -X GET \
    -G "http://localhost/myAccount" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/myAccount"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET myAccount`


<!-- END_b993d58523b3a10137a63c6986ce4f40 -->

<!-- START_0e0d27e96e383da427a7b1557e495cca -->
## Show form for all orders ordered by currently logged user

> Example request:

```bash
curl -X GET \
    -G "http://localhost/order/myOrders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/order/myOrders"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET order/myOrders`


<!-- END_0e0d27e96e383da427a7b1557e495cca -->

<!-- START_17acc8c7da7befaa2989d0ded77c5a35 -->
## Show form for create waiter

> Example request:

```bash
curl -X GET \
    -G "http://localhost/worker/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/worker/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET worker/create`


<!-- END_17acc8c7da7befaa2989d0ded77c5a35 -->

<!-- START_e7036a832ebfb074757630e241026f2f -->
## Show form for edit specific waiter

> Example request:

```bash
curl -X GET \
    -G "http://localhost/worker/edit/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/worker/edit/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET worker/edit/{id}`


<!-- END_e7036a832ebfb074757630e241026f2f -->

<!-- START_c256f2b76daa375d910dbd20cf7b911b -->
## Show form of all waiters for admin

> Example request:

```bash
curl -X GET \
    -G "http://localhost/worker/index" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/worker/index"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET worker/index`


<!-- END_c256f2b76daa375d910dbd20cf7b911b -->

<!-- START_e81fcf8718ce62886b1157b06f37fa66 -->
## Show form of all orders for currently logged waiter

> Example request:

```bash
curl -X GET \
    -G "http://localhost/orders/waiter-index" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/orders/waiter-index"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET orders/waiter-index`


<!-- END_e81fcf8718ce62886b1157b06f37fa66 -->

<!-- START_bc0ceb3b315a2be3e3d7d2edf7b50363 -->
## Show form for create order by waiter

> Example request:

```bash
curl -X GET \
    -G "http://localhost/orders/waiter-create/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/orders/waiter-create/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET orders/waiter-create/{tableId}`


<!-- END_bc0ceb3b315a2be3e3d7d2edf7b50363 -->

<!-- START_83d45a1fe53a8f0837b388d28ffaec81 -->
## Show form for edit specific order

> Example request:

```bash
curl -X GET \
    -G "http://localhost/orders/waiter-edit/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/orders/waiter-edit/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET orders/waiter-edit/{orderToken}`


<!-- END_83d45a1fe53a8f0837b388d28ffaec81 -->

<!-- START_f7756f508dbfa6a59256ecc2c09ca0b5 -->
## Show form of all tables for currently logged waiter

> Example request:

```bash
curl -X GET \
    -G "http://localhost/tables/waiter-index" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/tables/waiter-index"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET tables/waiter-index`


<!-- END_f7756f508dbfa6a59256ecc2c09ca0b5 -->

<!-- START_a560892ca2fa1ff12514cedd723d5b51 -->
## Show form for create new vouchers

> Example request:

```bash
curl -X GET \
    -G "http://localhost/vouchers/generate" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/vouchers/generate"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET vouchers/generate`


<!-- END_a560892ca2fa1ff12514cedd723d5b51 -->

<!-- START_9ef5dca2bced9d207977015052c195ec -->
## Show form of all vouchers for currently logged user

> Example request:

```bash
curl -X GET \
    -G "http://localhost/vouchers/customerVouchers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/vouchers/customerVouchers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET vouchers/customerVouchers`


<!-- END_9ef5dca2bced9d207977015052c195ec -->

<!-- START_fffbab8f49d0af671b665c4d7d608f4c -->
## Show the statistics for current logged worker

> Example request:

```bash
curl -X GET \
    -G "http://localhost/my-statistics/worker" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/my-statistics/worker"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET my-statistics/worker`


<!-- END_fffbab8f49d0af671b665c4d7d608f4c -->

<!-- START_fff9cf7287a4f72ab3ef02fbf75d72c1 -->
## Show all restaurant statistics

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/allStatistics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/allStatistics"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/allStatistics`


<!-- END_fff9cf7287a4f72ab3ef02fbf75d72c1 -->

<!-- START_e61df2ffb7d7924ec486ff5c948401d8 -->
## Show list of all workers for admin

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/workersStatistics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/workersStatistics"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/workersStatistics`


<!-- END_e61df2ffb7d7924ec486ff5c948401d8 -->

<!-- START_8d4562ec8e74e8916f455ffa170dc160 -->
## Show main statistics view for admin

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/statistics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/statistics"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/statistics`


<!-- END_8d4562ec8e74e8916f455ffa170dc160 -->

<!-- START_134d537bc80c5742a47bd9f6762b84cd -->
## admin/workerStatistics/{year}/{id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/workerStatistics/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/workerStatistics/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/workerStatistics/{year}/{id}`


<!-- END_134d537bc80c5742a47bd9f6762b84cd -->


