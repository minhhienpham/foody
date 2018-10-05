<?php
return [
    'admin' => [
        'title' => 'Order',
        'detail_title' => 'Detail Order',
        'list' => [
            'title' => 'List Orders'
        ],
        'id' => 'ID',
        'username' => 'Username',
        'address' => 'Address',
        'total_products' => 'Total Products',
        'money_ship' => 'Money Ship',
        'delivery_status' => 'Deliveried ?',
        'submit_time' => 'Submit time',
        'delivery_time' => 'Delivery time',
        'customer_note' => 'Customer Note',
        'total' => 'Total',
        'payment_status' => 'Payment Status',
        'processing_status' => 'Processing Status',
        'active' => 'Active',
        'currency' => 'VND',
        'table' => [
            'show' => 'Show',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ],
        'add' => [
            'title' => 'Add Order',
            'create' => 'Create',
            'enter_name' => 'Enter name of the Order',
            'enter_address' => 'Enter address of the Order',
            'enter_phone' => 'Enter phone of the Order',
            'enter_describe' => 'Enter describe of the Order',
            'enter_email' => 'Enter email of the Order',
            'enter_password' => 'Enter password of the Order',
        ],
        'edit' => [
            'title' => 'Edit Order',
            'update' => 'Update'
        ],
        'show' => [
            'title' => 'Show Detail Order',
            'list_products' => 'List of Products',
            'total_orders' => 'Total Orders',

        ],
        'message' => [
            'delivery_status' =>[
                'yes' => 'Done',
                'no'  => 'Not Yet'
            ],
            'paid' => [
                'yes' => 'Paid',
                'no'  => 'Not Yet'
            ],
            'payment_status' => [
                'approved' => 'Approved',
                'cancel'  => 'Cancel',
                'pending'  => 'Pending'
            ],
            'add' => 'Create New Order Successfull!',
            'add_fail' => 'Can not add New Order. Please check connect database!',
            'edit' => 'Update Order Successfull!',
            'edit_fail' => 'Can not edit Order by this Child!',
            'del' => 'Delete Order Successfull!',
            'del_fail' => 'Can not Delete Order. Please check connect database!',
            'msg_del' => 'Do you want to delete this Order?',
        ]
    
    ]
];
