## Category Api

### `GET` Categories
```
/api/categories
```
Get list all categories with child categories
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json

#### Response
```json
{
    "result": [
        {
            "id": 1,
            "name": "Alfreda Purdy Jr.",
            "parent_id": 0,
            "created_at": "2018-05-31 07:04:58",
            "updated_at": "2018-05-31 07:04:58",
            "deleted_at": null,
            "children": [
                {
                    "id": 7,
                    "name": "Eulalia Bernhard",
                    "parent_id": 1,
                    "created_at": "2018-05-31 07:04:58",
                    "updated_at": "2018-05-31 07:04:58",
                    "deleted_at": null,
                },
                {
                    "id": 8,
                    "name": "Eulalia",
                    "parent_id": 1,
                    "created_at": "2018-05-31 07:04:58",
                    "updated_at": "2018-05-31 07:04:58",
                    "deleted_at": null,
                }
            ]
        },
    ],
    "code": 200
}
```