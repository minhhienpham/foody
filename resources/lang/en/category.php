<?php
return [
    'admin' => [
        'title' => 'Category',
        'list' => [
            'title' => 'List Categories'
        ],
        'table' => [
            'id' => 'ID',
            'name' => 'Name',
            'parent_id' => 'Parent ID',
            'view_children' => 'View sub Categories',
            'show' => 'Show',
            'action' => 'Action',
            'child_category' => 'Child Category',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ],
        'add' => [
            'title' => 'Add Category',
            'name' => 'Name Category',
            'parent_category' => 'Parent Category',
            'submit' => 'Submit',
            'reset' => 'Reset',
            'placeholder_name' => 'Category Name',
            'create' => 'Create Category'
        ],
        'edit' => [
            'title' => 'Edit Category',
        ],
        'show' => [
            'title' => 'Show Category',
        ],
        'message' => [
            'add' => 'Create New Category Successfull!',
            'add_fail' => 'Can not add New Category. Please check connect database!',
            'edit' => 'Update Category Successfull!',
            'edit_fail' => 'Can not edit Category by this Child!',
            'del' => 'Delete Category Successfull!',
            'del_fail' => 'Can not Delete Category. Please check connect database!',
            'del_no_permit' => 'Can not delete this Category!',
            'msg_del' => 'Do you want to delete this Category?',
        ]
    
    ]
];
