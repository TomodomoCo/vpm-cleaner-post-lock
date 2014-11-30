# Less Obnoxious Post Lock

Less Obnoxious Post Lock (or LOPL) moves the post lock dialog box out of the way so you can manipulate a post edit screen without diving into the web inspector.

By default, LOPL only moves the post lock dialog for administrators, but you're free to change that by hooking into the `lopl_conditional` filter.

## `lopl_conditional`

The `lopl_conditional` filter allows you to adjust who sees the modified post lock style.

In addition to the filter's current value, LOPL will allow you to access two additional variables in your filter callback function. The second parameter is the return value of `wp_get_current_user()`, and the second parameter is the value of `get_current_screen()`. These parameters will let you perform more complicated filtering, based on user, post type, etc.

In this example, we make sure that only the user with the login "pizza" gets access to the less obnoxious post lock.

```php
function my_lopl_conditional( $status, $user ) {
	if ( $user->user_login == 'pizza' ) {
		return true;
	} else {
		return false;
	}
}
add_filter( 'lopl_conditional', 'my_lopl_conditional', 10, 2 );
```
