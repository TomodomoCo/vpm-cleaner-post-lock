# Cleaner Post Lock

Cleaner Post Lock moves the post lock dialog box out of the way so you can manipulate a post edit screen without diving into the web inspector.

By default, the plugin only moves the post lock dialog for administrators, but you're free to change that by hooking into the `vpm_should_clean_post_lock` filter.

## Usage

The `vpm_should_clean_post_lock` filter allows you to adjust who sees the modified post lock style.

In addition to the filter's current value, you can access two additional variables in your filter callback function. The second parameter is the return value of `wp_get_current_user()`, and the second parameter is the value of `get_current_screen()`. These parameters will let you perform more complicated filtering, based on user, post type, etc.

In this example, we make sure that only the user with the login "pizza" sees the cleaner post lock screen.

```php
function my_conditional( $status, $user ) {
	if ( $user->user_login === 'pizza' ) {
		return true;
	}

	return false;
}
add_filter( 'vpm_should_clean_post_lock', 'my_conditional', 10, 2 );
```

## License & Conduct

This project is licensed under the terms of the MIT License, included in `LICENSE.md`.

All Van Patten Media Inc. open source projects follow a strict code of conduct, included in `CODEOFCONDUCT.md`. We ask that all contributors adhere to the standards and guidelines in that document.

Thank you!
