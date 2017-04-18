Project Description :
A basic Buy/Sell website with user login and other basic functionality(like image uploads, filtering of ADs etc.)

File Description : 
helpers.php : Consists of all functions required for various operations throughout the website. Helps in reducing redundancy of code.

index.php : Displays the home page of the website.

contact_seller.php : Renders a page with contact info of the user of the concerned AD. Also provides a link to render all the ADs 
posted by a particular user.

items.php : Renders a table with details of all ADs if user reaches through "Guest" link or "Buy" link. Also displays concerned 
user's AD in the portfolio page. Renders ADs of a logged in user with a (Your AD) indication in the "Contact Seller" column.

login.php : Displays form for login for GET requests and validates user inputrs against data stored in database for POST request. Also
validates user input and renders a message in case of an error.

logout.php : Destroys current user's session and redirects to home page(index.php).

portfolio.php : Renders table with all ADs posted by the user or displays a message in case no ADs are posted by the user. After a 
user logs in he/she is redirected to this page.

register.php : Dispalys registration form for GET requests and stores new user data in database for POST requests. Also validates 
and sanitizes user input before storing into database.

sell.php : Displays a sell form for posting a new AD for GET requests for the page and stores sanitized data into database then 
dispalys a "success" message for POST requests.

upload.php : Uses $_FILE global to upload images to server in .jpeg/.jpg/.png formats only. It saves a unique random number 
corresponding to the image with the concerned AD in the database and also renames the image file to the same number before saving
on the server.

apology.php : Renders apology message in case of an error.

footer.php : View to render footer of a page(reduces redundancy of code).

header.php : View to render footer of a page(reduces redundancy of code). Mainly consists of HTML with the title, favicon, link to 
CSS file etc.

item_view.php : View which renders the table of items based on conditions taken from items.php.

How to use in CS50 IDE:
1. Start the webserver(with project1/public as root) by typing the following in the terminal window,
    apache50 start project2/public
    
2. Enter the following address in your browser to visit the website.
    https://project-2-namantiwari.c9users.io

3.In case of a registered user login withyour credentials to continue or register as a new user or view ADs as guest.