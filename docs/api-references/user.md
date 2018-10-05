## User Api
### `POST` Register
```
/api/register
```
Register user

#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json

#### Query Param
| Key | Value | Description |
|---|---|---|
| username | text | Username |
| email | email | User's Email |
| password | password | User's Password |
| full_name | text | Full Name |
| gender | number | 0 for Male 1 for Female |
| phone | number | Phone |

#### Response
* _Error_
``` json
{

    "error": [
        "username": [
            "The username has already been taken."
        ],
        "email": [
            "The email has already been taken."
        ],
    ],
    "code": 422
}
```

* _Success_
```json
{
    "result": {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImIxMjg2YjJmMjQ4MWE1ZTIzMGUxYjcwZGM2ZWE3YmQ5OTBkNWI3YmY0Y2VlNDdkNWU0MGEzOTU0ZjM1NTY1NTA3OGUxZGY4NTRhYmMzZjdmIn0.eyJhdWQiOiI1IiwianRpIjoiYjEyODZiMmYyNDgxYTVlMjMwZTFiNzBkYzZlYTdiZDk5MGQ1YjdiZjRjZWU0N2Q1ZTQwYTM5NTRmMzU1NjU1MDc4ZTFkZjg1NGFiYzNmN2YiLCJpYXQiOjE1MzQ3MDA3NjksIm5iZiI6MTUzNDcwMDc2OSwiZXhwIjoxNTY2MjM2NzY4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.c_13C90PxxAl8AvZItrW-IFSVJkvbKSPn4reat5qm_xgY-Fd3YpidMsqye_p6SPN1b5mBSLlWOt7BC3Gsw1z4qaZuChSSJ4ZDP6rW_pz2rujU3dRxKf1s7Y-ZB4z2xdAXLaxeVcniWSPLYiBacAUQQURs7_8c6cF9mJvcrk6A4iGdXytu3sCzc3nHyiPhzs3u-MBjpIa4kP_1jdN4udEbbCtbezpq6I6OF-1EWS5LTnfK9PDvckw9AYNk0M5As2-Yxqz045lUnGEVxNwHrvN9LoREIvscBTBc_SkIuNygw-8BQBlHHwlzQP5ZMOJhZ2JUDJiteumcGq2ui48CqgXk2usczF_DSeiOHrFKkpqmuTj_hBNvYHDH_yJFvQIZjjbnHOWud2qlotEtAszjE-sI3nfJBTuOMK0rTSBngdgcp3usa932TkL1XK6LisT14FHiVCjXUn_QlUfS7Q9h31oWM5c0YcmQYbK7qrbiPOhlDNu7tOusaEu3CZixg_QCDzPVfpjthtyZ0gUYZek1phuo_dlNVjwct1UedIKKbWrAy9qH2SRI84laNIsGGnJfWf5kVQPVZf76wa9O57ovSIiZPiNjhr09r1MzjJOsLwP9biQ0BnMMbfiKaTmMsMVQ1pC_KsvRt5I9eYa7E9FLUfdluiBmGDXihkBN-R5kDKi0cg",
        "user": {
            "id": 1,
            "username": "rdare",
            "email": "heloise54@example.net",
            "password": "",
            "is_active": 1,
            "role_id": 3,
            "created_at": "2018-08-07 04:27:02",
            "updated_at": "2018-08-07 16:38:23",
            "deleted_at": null,
        }
    },
    "code": 200
}
```

### `POST` Login
```
/api/login
```
Login User
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
 #### Query Param
| Key | Value | Description |
|---|---|---|
| username | username | User's Username |
| password | password | User's Password |
 #### Response
* _Error_
``` json
{
    "error": "Unauthorised",
    "code": 401
}
```
 * _Success_
```json
{
    "result": {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImIxMjg2YjJmMjQ4MWE1ZTIzMGUxYjcwZGM2ZWE3YmQ5OTBkNWI3YmY0Y2VlNDdkNWU0MGEzOTU0ZjM1NTY1NTA3OGUxZGY4NTRhYmMzZjdmIn0.eyJhdWQiOiI1IiwianRpIjoiYjEyODZiMmYyNDgxYTVlMjMwZTFiNzBkYzZlYTdiZDk5MGQ1YjdiZjRjZWU0N2Q1ZTQwYTM5NTRmMzU1NjU1MDc4ZTFkZjg1NGFiYzNmN2YiLCJpYXQiOjE1MzQ3MDA3NjksIm5iZiI6MTUzNDcwMDc2OSwiZXhwIjoxNTY2MjM2NzY4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.c_13C90PxxAl8AvZItrW-IFSVJkvbKSPn4reat5qm_xgY-Fd3YpidMsqye_p6SPN1b5mBSLlWOt7BC3Gsw1z4qaZuChSSJ4ZDP6rW_pz2rujU3dRxKf1s7Y-ZB4z2xdAXLaxeVcniWSPLYiBacAUQQURs7_8c6cF9mJvcrk6A4iGdXytu3sCzc3nHyiPhzs3u-MBjpIa4kP_1jdN4udEbbCtbezpq6I6OF-1EWS5LTnfK9PDvckw9AYNk0M5As2-Yxqz045lUnGEVxNwHrvN9LoREIvscBTBc_SkIuNygw-8BQBlHHwlzQP5ZMOJhZ2JUDJiteumcGq2ui48CqgXk2usczF_DSeiOHrFKkpqmuTj_hBNvYHDH_yJFvQIZjjbnHOWud2qlotEtAszjE-sI3nfJBTuOMK0rTSBngdgcp3usa932TkL1XK6LisT14FHiVCjXUn_QlUfS7Q9h31oWM5c0YcmQYbK7qrbiPOhlDNu7tOusaEu3CZixg_QCDzPVfpjthtyZ0gUYZek1phuo_dlNVjwct1UedIKKbWrAy9qH2SRI84laNIsGGnJfWf5kVQPVZf76wa9O57ovSIiZPiNjhr09r1MzjJOsLwP9biQ0BnMMbfiKaTmMsMVQ1pC_KsvRt5I9eYa7E9FLUfdluiBmGDXihkBN-R5kDKi0cg",
        "user": {
            "id": 1,
            "username": "rdare",
            "email": "heloise54@example.net",
            "password": "",
            "is_active": 1,
            "role_id": 3,
            "created_at": "2018-08-07 04:27:02",
            "updated_at": "2018-08-07 16:38:23",
            "deleted_at": null,
        }
    },
    "code": 200
}
```
 ### `POST` Logout
```
/api/logout
```
Logout user
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer $token
 #### Response
* _Success_
 ```
 