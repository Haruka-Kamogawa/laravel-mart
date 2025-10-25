<?php

return [
    // components
    // header.blade.php
    'header' => [
        'search' => 'Search',
    ],

    // auth
    // register.blade.php
    'register' => [
        'title' => 'Create an Account',
        'name' => 'Full Name',
        'name_placeholder' => 'Enter your fullname',
        'name_error' => 'Please enter your full name.',
        'email' => 'Email Address',
        'email_placeholder' => 'Enter your email address',
        'email_error' => 'Please enter your email address.',
        'postal_code' => 'Postal Code',
        'postal_code_placeholder' => 'Enter your postal code',
        'address' => 'Address',
        'address_placeholder' => 'Enter your address',
        'phone' => 'Phone Number',
        'phone_placeholder' => 'Enter your phone number',
        'password' => 'Password',
        'password_placeholder' => 'Enter your password',
        'password_error' => 'Please enter your password.',
        'password_confirm' => 'Confirm Password',
        'password_confirm_placeholder' => 'Re-enter your password',
        'submit' => 'Sign Up',
    ],

    // login.blade.php
    'login' => [
        'title' => 'Login',
        'email_placeholder' => 'Email Address',
        'email_error' => 'The email address may be incorrect.',
        'password_placeholder' => 'Password',
        'password_error' => 'The password may be incorrect.',
        'remember_me' => 'Keep me signed in',
        'submit' => 'Log In',
        'forgot_password' => 'Forgot your password?',
        'signup' => 'Sign Up',
    ],

    // forgot-password.blade.php
    'forgot_password' => [
        'title' => 'Reset Password',
        'description' => "Please enter your registered email address.<br>We'll send you an email with instructions to reset your password.",
        'email_placeholder' => 'Email Address',
        'email_error' => 'The email address may be incorrect.',
        'submit' => 'Send Email',
        'status_success' => 'A password reset link has been sent to your email address.',
    ],

    // verify-email.blade.php
    'register_confirmation' => [
        'title' => 'Thank you for registering!',
        'temporary_status' => 'Your account is currently in a temporary status.',
        'check_email' => "We've sent a confirmation email to the address you provided.",
        'click_link' => 'Please click the link in that email to complete your registration.',
        'go_home' => 'Go to Home Page',
    ],


    // web
    // index.blade.php
    'top' => [
        'recommend' => 'Recommend',
        'products' => 'Products List',
        'more' => 'More →'
    ],

    // product
    // show.blade.php
    'product' => [
        'quantity' => 'Quantity',
        'add' => 'Add to Cart',
        'remove_fav' => 'Remove Favorite',
        'add_fav' => 'Add to Favorites',
        'customer_review' => 'Customer Reviews',
        'no_review' => 'No reviews yet.',
        'write_review' => 'Write a Review',
        'rating' => 'Rating',
        'title' => 'Title',
        'error_title' => 'Enter a title.',
        'review' => 'Review',
        'error_review' => 'Write your review.',
        'submit' => 'Submit Review',
    ],

    // index.blade.php
    'product_list' => [
        'home' => 'Home',
        'all_products' => 'All Products',
        'products_list' => 'Products List',
        'products_in_category' => ':count Products in ":category"',
        'results_for' => ':count results found for ":keyword"',
        'total_items' => 'Products List ":count items"',
        'sort' => 'Sort',
        'sort_newest' => 'Newest',
        'sort_price' => 'Price',
        'no_products' => 'No products found.',
        'price' => 'Price',
    ],


    // users
    // mypage.blade.php
    'mypage' => [
        'title' => 'My Account',
        'flash_success' => 'Your changes have been saved successfully.',
        'edit_account_title' => 'Edit Account Details',
        'edit_account_description' => 'You can edit your account to update your information.',
        'order_history_title' => 'Order History',
        'order_history_description' => 'View your past purchases in Order History.',
        'change_password_title' => 'Change Password',
        'change_password_description' => 'Change your password to keep your account secure.',
        'logout_title' => 'Log out',
        'logout_description' => 'Click here to log out from your account.',
    ],

    // edit.blade.php
    'edit_profile' => [
        'breadcrumb' => 'My Account > Edit Profile',
        'title' => 'Edit Profile',
        'name' => 'Full Name',
        'error_name' => 'Please enter your full name.',
        'email' => 'Email Address',
        'error_email' => 'Please enter your email.',
        'postal_code' => 'Postal Code',
        'error_postal_code' => 'Please enter your postal code.',
        'address' => 'Address',
        'error_address' => 'Please enter your address.',
        'phone' => 'Phone Number',
        'error_phone' => 'Please enter your phone number.',
        'save' => 'Save',
    ],

    // edit_password.blade.php
    'edit_password' => [
        'breadcrumb' => 'My Account > Edit Password',
        'title' => 'Edit Password',
        'new_password' => 'New Password',
        'confirm_password' => 'Confirm Password',
        'save' => 'Save',
    ],

    // order_history.blade.php
    'order_history' => [
        'breadcrumb' => 'My Account > Order History',
        'title' => 'Order History',
        'no_orders' => 'No orders yet.',
        'order_number' => 'Order Number',
        'ordered_at' => 'Ordered at',
        'total' => 'Total',
        'status' => 'Status',
        'view_details' => 'View Details',
    ],

    // order_detail.blade.php
    'order_detail' => [
        'breadcrumb' => 'My Account > Order History > Order Detail',
        'title' => 'Order Detail',
        'title_sub' => 'Order Information',
        'order_number' => 'Order Number',
        'ordered_at' => 'Ordered at',
        'total' => 'Total',
        'total_items' => 'Total items',
        'product' => 'Product',
        'price' => 'Price',
        'quantity' => 'Qty',
        'subtotal' => 'Subtotal',
        'back_to_history' => 'Back to Order History',
        'deleted_product' => 'Deleted product',
    ],

    // favorite.blade.php
    'favorites' => [
        'title' => 'Favorites',
        'empty_list' => 'Your favorites list is empty.',
        'remove' => 'Remove',
        'add_to_cart' => 'Add to Cart',
    ],

    // carts
    // index.blade.php
    'cart' => [
        'title' => 'Shopping Cart',
        'product' => 'Product',
        'price' => 'Price',
        'quantity' => 'Quantity',
        'total' => 'Total',
        'update' => 'Update',
        'remove' => 'Remove',
        'total_label' => 'Total',
        'tax' => 'All prices include tax',
        'continue_shopping' => 'Continue Shopping',
        'confirm_purchase' => 'Confirm Purchase',
        'modal_title' => 'Confirm Your Purchase',
        'modal_body' => 'Are you sure you want to proceed with your purchase?',
        'cancel' => 'Cancel',
        'purchase' => 'Purchase',
        'empty_cart' => 'Your cart is empty.',
        'browse_products' => 'Browse Products',
        'success' => 'Operation was successful.',
        'error' => 'Operation failed.',
    ],

    // checkout
    // index.blade.php
    'checkout' => [
        'title' => 'Review Your Order',
        'review_items' => 'Please review your items before proceeding to payment.',
        'product' => 'Product',
        'quantity' => 'Quantity',
        'subtotal' => 'Subtotal',
        'total' => 'Total',
        'pay_now' => 'Pay Now',
        'back_to_cart' => '← Back to Cart',
    ],

    // success.blade.php
    'success' => [
        'title' => 'Payment Successful!',
        'thank_you' => 'Thank you for your purchase.',
        'order_summary' => 'Order Summary',
        'order_number' => 'Order Number',
        'total' => 'Total',
        'status' => 'Status',
        'continue_shopping' => 'Continue Shopping',
    ],
];