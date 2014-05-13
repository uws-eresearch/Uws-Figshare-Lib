README for the Alpha API work on Figshare.
Last Modified Date: 2104:05:08

Main Figshare site. http://figshare.com/
You must sign up for a free account. Once that is done you can register an application and obtain your keys. 

USING Figshare through the API.

You have Four files.
One is the Main API file Figshare_api.php
fs_include.php. is a file that is included into the above file that takes your keys from the Figshare site.
fs_include_generic.php is a template for fs_include.php. Once it is filled in with keys save it as fs_include.php.
README.txt is this file.

INSTALLATION.
In a publically available place on a server, EG /var/www/figshare/.

The server is supposed to have a available domain and be accessable from the outside world

The procedure to get something loaded into figshare is as follows.

Create an Article.
This will default to being a draft article.

You won't see the article on the homepage yet.

Upload some data to the Article. (eg readme.txt)

You will have a json string returned.

{"article_id": 960162, "views": 0, "downloads": 0, "shares": 0, "version": 1, "doi": "http://dx.doi.org/10.6084/m9.figshare.960162", "title": "GD Test dataset", "defined_type": "dataset", "status": "Drafts", "published_date": "01:04, Mar 14, 2014", "description": "Test description", "description_nohtml": "Test description", "total_size": false, "owner": {"id": 526927, "full_name": "Bob Dobolina"}, "authors": [{"first_name": "Bob", "last_name": "Dobolina", "id": 12345678, "full_name": "Bob Dobolina"}], "tags": [], "categories": [], "files": []}

You should be able to see the article in a list in your http://figshare.com/account/my_data space now.

Then add some categories to the Article.

Then add Tags to the Article.

Then it can be made private.

Then when you are happy it can be made public.

