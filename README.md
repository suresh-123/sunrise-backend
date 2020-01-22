# Sunrise Click Online Shopping Cart
 
- MVC pattern and OOPS
- Handling databases with PDO

### SYSTEM REQUIREMENTS
- Windows OR CENT OS 7
- Apache 2.4
- PHP 7.2.12 or later
- MariaDB 10.2
- PDO

### Setup Project

1. Download as .zip or clone this repository using below links,  
    Back End  - `git clone https://github.com/suresh-123/sunrise-backend.git`  
2. Import the `data/sunriseclick.sql` file to phpMyAdmin
3. Install composer  
    - https://getcomposer.org/download/
4. Run `composer install`
5. Start your Apache server.
    - To Access Back End   : http://localhost/sunrise-backend

You're done :)

### Back End API Access Details

```console
API Description : Save Subscribers Data
API URL         : http://localhost/sunrise-backend/api/v1/save-subscriber-data
HTTP Method     : POST
Content Type    : application/x-www-form-urlencoded

Parameter

| Field        | Type           | Required      |
| :---         | :---           | :---          |
| email        | string         | Yes           |

```