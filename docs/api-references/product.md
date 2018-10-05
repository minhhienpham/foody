## Product Api

### `GET` List Newest products
```
/api/products?newest_products={newest_products}
```
Get list newest products with limited items
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json

#### Response
```json
{
    "result": [
        {
            "id": 7,
            "name": "Eulalia Bernhard",
            "describe": 1,
            "price": "2018-05-31 07:04:58",
            "store_id": 7,
            "category": 2,
            "store": {
                "id": 1,
                "name": "Ewald Champlin",
                "address": "605 Marcel Port\nKochborough, ND 00343",
                "phone": "725.737.6187 x33221",
                "describe": "Reprehenderit ea et blanditiis ea. aceat architecto magni repellendus. Et magni",
                "image": "0",
                "is_active": 1,
                "created_at": "2018-08-16 06:14:11",
                "updated_at": "2018-08-16 06:14:11",
                "deleted_at": null
            },
            "images": [
                {
                    "id": 2,
                    "path": "img1.jpg",
                    "product_id": 7,
                    "created_at": "2018-05-31 07:04:58",
                    "updated_at": "2018-05-31 07:04:58",
                    "deleted_at": null
                },
                {
                    "id": 3,
                    "path": "img3.jpg",
                    "product_id": 7,
                    "created_at": "2018-05-31 07:04:58",
                    "updated_at": "2018-05-31 07:04:58",
                    "deleted_at": null
                }
                    
            ],
            "created_at": "2018-05-31 07:04:58",
            "updated_at": "2018-05-31 07:04:58",
            "deleted_at": null,
        },
    ],
    "code": 200
}
```

### `GET` List Hotest products in Category Home page
```
/api/products?category_id={category.id}
```
Get list hotest products in category home page
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json

#### Response
```json
{
    "result": [
        {
            "id": 7,
            "name": "Eulalia Bernhard",
            "describe": 1,
            "price": "2018-05-31 07:04:58",
            "store_id": 7,
            "category": 2,
            "created_at": "2018-05-31 07:04:58",
            "updated_at": "2018-05-31 07:04:58",
            "deleted_at": null,
            "store": {
                "id": 1,
                "name": "Ewald Champlin",
                "address": "605 Marcel Port\nKochborough, ND 00343",
                "phone": "725.737.6187 x33221",
                "describe": "Reprehenderit ea et blanditiis ace architecto magni repellendus. Et magni",
                "image": "0",
                "is_active": 1,
                "created_at": "2018-08-16 06:14:11",
                "updated_at": "2018-08-16 06:14:11",
                "deleted_at": null
            },
            "images": [
                {
                    "id": 2,
                    "path": "img1.jpg",
                    "product_id": 7,
                    "created_at": "2018-05-31 07:04:58",
                    "updated_at": "2018-05-31 07:04:58",
                    "deleted_at": null
                },
                {
                    "id": 3,
                    "path": "img3.jpg",
                    "product_id": 7,
                    "created_at": "2018-05-31 07:04:58",
                    "updated_at": "2018-05-31 07:04:58",
                    "deleted_at": null
                }
                    
            ],
        },
    ],
    "code": 200,
}
```
