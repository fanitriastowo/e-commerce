### List Form Validation Rules
* required // Returns FALSE if the form field is empty.
* matches // Returns FALSE if the form field does not match the defined value of parameter.
* is_unique // Returns FALSE if the form field is not unique to the table and field name in the parameter.
* min_length // Returns FALSE if the form field is shorter than the parameter value.
* max_length // Returns FALSE if the form field is longer than the parameter value.
* exact_length // Returns FALSE if the form field is not exactly the parameter value.
* greater_than // Returns FALSE if the form field is less than the parameter value or not numeric.
* less_than // Returns FALSE if the form field is greater than the parameter value or not numeric.
* alpha // Returns FALSE if the form field contains anything other than alphabetical characters.
* alpha_numeric // Returns FALSE if the form field contains anything other than alpha-numeric characters.
* alpha_dash // Returns FALSE if the field contains anything other than alpha-numeric characters, underscores or dashes.
* numeric // Returns FALSE if the form field contains anything other than numeric characters.
* integer // Returns FALSE if the form field contains anything other than an integer.
* decimal // Returns FALSE if the form field contains anything other than a decimal number.
* is_natural // Returns FALSE if the form field contains anything other than a natural number.
* is_natural_no_zero // Returns FALSE if the form field contains anything other than a natural number, but not zero.
* valid_email // Returns FALSE if the form field does not contain a valid email address.
* valid_emails // Returns FALSE if any value provided in a comma separated list is not a valid email.
* valid_ip // Returns FALSE if the supplied IP is not valid.
* valid_base64 // Returns FALSE if the supplied string contains anything other than valid Base64 characters

### CodeIgniter 2
Open Source PHP Framework (originally from EllisLab)

For more info, please refer to the user-guide at http://www.codeigniter.com/userguide2/  
(also available within the download package for offline use)

**WARNING:** *CodeIgniter 2.x is no longer under development and only receives security patches until October 31st, 2015.
Please update your installation to the latest CodeIgniter 3.x version available
(upgrade instructions [here](http://www.codeigniter.com/userguide3/installation/upgrade_300.html)).*
