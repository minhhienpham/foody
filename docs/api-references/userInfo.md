## User Info Api

### `GET` User Info
```
/api/users/info
```
Get user info
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer $token

##### Example
| URL | Description |
|---|---|
| /api/users/info | Get information of user |


#### Response
``` json
{
    "result": [
        {
            "user": {
                "id": 1,
                "username": "hien",
                "full_name":"hien pham",
                "email": "hien.pham@asiantech.vn",
                "gender":"female",
                "created_at": "2018-08-24 17:10:01",
                "updated_at": "2018-08-24 17:30:01",
            },
        }
    ],
    "code": 200
}
```

### `Put` Edit User Info
```
/api/users/profile
```
Get user info
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer $token

#### Query Param
| Param | Type | Description |
|---|---|---|
| full_name | string | full name of user |
| gender | int | gender of user |
| phone | int | phone number of user |
| email | string |  email of user |

##### Example
| URL | Description |
|---|---|
| /api/users/profile | Update information of user |

#### Response
* _Error_
``` json
{
    "message": "The given data was invalid.",
    "code": 422,
    "request": {
        "gender": "1",
        "phone": "01214556631",
        "_method": "put",
    }
}
```

* _Success_
``` json
{
    "result": {
        "id": 2,
        "username": "hien",
        "email": "hien@gmail.com",
        "phone": "01214556631",
        "created_at": "2018-08-24 17:10:00",
        "updated_at": "2018-06-18 17:30:00",
        "deleted_at": null,
    },
    "code": 200
}
```
