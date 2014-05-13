<?php
//-----------------------------------------------------------------
// Version:
// Date:
// Desc:

// Version: 0.11
// Date: Mon 12th May.
// Desc: Last cleanup

// Version: 0.11
// Date: Fri 9 May
// Desc: Cleanup and Seperation of testing area.

// Version: 0.1
// Date: Mar 21-22 2014
// Desc: Initial draft and testing of the Lib.
//------------------------------------------------------------------
require 'fs_include.php';  // Where the secret strings are stored.

// Function summary..

/*
Create_an_Article($title, $description, $type)
Update_Article ($title, $description, $type, $article_id)
Delete_Article ($article_id)
Add_Category_to_Article($article_id, $cat_number)
Add_Tags_to_Article ($article_id, $tag_name)
Add_links_to_Article($article_id, $tag_name)
Search_for_an_author ($author)
Create_new_author ($author)
Add_authors_to_article ($article_id, $author_id)
Upload_file_to_article ($article_id, $file_path)
Check_the_article_details($article_id)
View_article_versions($article_id)
View_article_version_details($article_id, $version_id)
Make_the_article_public($article_id)
Make_the_article_private($article_id)
 

obtain_category_list ()

*/

// The current category lists can be obtained fropm http://api.figshare.com/v1/categories
// This is also not in the doco.

//-------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------
function Create_an_Article($title, $description, $type) {

// HTTP Method: POST
// PATH: /v1/my_data/articles
// Parameters 	title, description, defined_type.
// Manditory Paramaters: defined_type.
// defined_type can be "dataset', 'figure', 'media', 'poster', 'paper', 'thesis', 'code', 'presentation', 'fileset'

		$method = 'POST';
		$data_arr = array ('title' => $title,
						   'description' => $description,
						   'defined_type' => $type);

		$url = $GLOBALS ['fs_main_fig_url'] .'v1/my_data/articles';
		$data = json_encode($data_arr);
		$response = Talk_To_Figshare ($method, $url, $data_arr, "1");
		
		return $response;
}
//-------------------------------------------------------------------------------------------------------
function Update_Article ($title, $description, $type, $article_id) {

// PUT's the values passed in $title, $description or $type into the values of the article ($article_bo) 
// HTTP Method: PUT
// PATH: /v1/my_data/articles/{article_id}
// Parameters 	title, description, defined_type.
// Manditory Paramaters: None. No change ojn blank fields
// defined_type can be "dataset', 'figure', 'media', 'poster', 'paper', 'thesis', 'code', 'presentation', 'fileset'

		$method = 'PUT';
		$data_arr = array ('title' => $title,
						   'description' => $description,
						   'defined_type' => $type);

		$url = $GLOBALS ['fs_main_fig_url'] .'v1/my_data/articles/' . "$article_id";
		$data = json_encode($data_arr);
		$response = Talk_To_Figshare ($method, $url, $data_arr, "1");
		
		return $response;
}
//-------------------------------------------------------------------------------------------------------
function Delete_Article ($article_id) {

// DELETS's an article with article number($article_no) 
// HTTP Method: DELETE
// PATH: /v1/my_data/articles/{article_id}
// Parameters   article_no
// Manditory Paramaters: article_no

		$method = 'DELETE';
		$data_arr = array ('title' => '');

		$url = $GLOBALS ['fs_main_fig_url'] .'v1/my_data/articles/' . "$article_id";
		$data = json_encode($data_arr);
		$response = Talk_To_Figshare ($method, $url, $data_arr, "1");
		
		return $response;
}
//-------------------------------------------------------------------------------------------------------
function Add_Category_to_Article($article_id, $cat_number) {

// Adds a tag to trhe article given in article_no
// HTTP Method: PUT
// PATH:   /v1/my_data/articles/{article_id}/categories
// Parameters; category_name, article_no (in url)

		$method = 'PUT';
		$data_arr = array ('tag_name' => "$tag_name");
		$url = $GLOBALS ['fs_main_fig_url'] .'v1/my_data/articles/' . "$article_id" . '/tags';
		$data = json_encode($data_arr);
		$response = Talk_To_Figshare ($method, $url, $data_arr, "1");
		
		return $response;
}
//-------------------------------------------------------------------------------------------------------
function Add_Tags_to_Article($article_id, $tag_name) {

// Adds a tag to trhe article given in article_no
// HTTP Method: PUT
// PATH:   /v1/my_data/articles/{article_id}/tags
// Parameters; tag_name, article_no (in url)

		$method = 'PUT';
		$data_arr = array ('tag_name' => "$tag_name");
		$url = $GLOBALS ['fs_main_fig_url'] .'v1/my_data/articles/' . "$article_id" . '/tags';
		$data = json_encode($data_arr);
		$response = Talk_To_Figshare ($method, $url, $data_arr, "1");
		
		return $response;
}
//-------------------------------------------------------------------------------------------------------
function Add_lnks_to_Article ($article_id, $link_addr) {

// HTTP method 	PUT
// PATH 	/v1/my_data/articles/{article_id}/links
// Parameters 	$link_addr
// Manditory Paramaters: article_no

		$method = 'PUT';
		$data_arr = array ('link' => "$link_addr");
		$url = $GLOBALS ['fs_main_fig_url'] .'v1/my_data/articles/' . "$article_id" . '/links';
		$data = json_encode($data_arr);
		$response = Talk_To_Figshare ($method, $url, $data_arr, "1");
		
		return $response;

}
//-------------------------------------------------------------------------------------------------------
function Search_for_an_author ($author) {

// TO be Done.

/*
		$method = 'GET';
		$data = '';
        $search_for = urlencode($author);
		$url = $GLOBALS ['fs_main_fig_url'] . 'v1/my_data/authors?search_for='.$search_for;
		$response = Talk_To_Figshare ($method, $url, $data);
		
		return $response;
*/

return "Not implemented yet";
}
//-------------------------------------------------------------------------------------------------------
function Create_new_author ($author) {

// Could be that the first name, last name, and id may be able to be written?

//   HTTP method; 	POST
//   PATH; 	/v1/my_data/authors
//   Parameters; 	full_name

		$method = 'POST';
		$data_arr = array ('full_name' => $author);
		$url = $GLOBALS ['fs_main_fig_url'] .'v1/my_data/authors';
		$data = json_encode($data_arr);
		$response = Talk_To_Figshare ($method, $url, $data_arr, "1");
		return $response;

}
//-------------------------------------------------------------------------------------------------------
function Add_authors_to_article ($article_id, $author_id) {

// HTTP method 	PUT
// PATH 	/v1/my_data/articles/{article_id}/authors
// Parameters 	author_id

		$method = 'PUT';
		$data_arr = array ('author_id' => "$author_id");
		$url = $GLOBALS ['fs_main_fig_url'] . 'v1/my_data/articles/' . "$article_id" . '/authors';
		$data = json_encode($data_arr);
		$response = Talk_To_Figshare ($method, $url, $data_arr, "1");

return "Not implemented yet";

}
//-------------------------------------------------------------------------------------------------------
function Upload_file_to_article ($article_id, $file_path) {

// HTTP method: 	PUT
// PATH: 	        /v1/my_data/articles/{article_id}/files
// Parameters: 	    filedata

		$full_file_path = "@".$file_path;

		$method = 'PUT';
        $data_arr = array('filedata'=> "$full_file_path");
		$url = $GLOBALS ['fs_main_fig_url'] . 'v1/my_data/articles/' . "$article_id" . '/files';
//		$data = json_encode($data_arr);

		$response = Talk_To_Figshare ($method, $url, $data_arr, "2");
		
		return $response;
}
//-------------------------------------------------------------------------------------------------------
function Check_the_article_details($article_id) {

// HTTP method: 	GET
// PATH: 	        /v1/my_data/articles/{$article_id}
// Parameters       $article_id
// Returns a json string

		$method = 'GET';
        $data_arr = '';
		$url = $GLOBALS ['fs_main_fig_url'] . 'v1/my_data/articles/' . "$article_id";
	
		$response = Talk_To_Figshare ($method, $url, $data_arr, "3");
		
		return $response;  // json string
}
//-------------------------------------------------------------------------------------------------------
function View_article_versions($article_id) {

// HTTP method: 	GET
// PATH: 	        /v1/my_data/articles/{$article_id}/versions
// Parameters:      $article_id
// Returns:         a json string

		$method = 'GET';
        $data_arr = '';
		$url = $GLOBALS ['fs_main_fig_url'] . 'v1/my_data/articles/' . "$article_id" . '/versions';
	
		$response = Talk_To_Figshare ($method, $url, $data_arr, "3");
		
		return $response;  // json string
}
//-------------------------------------------------------------------------------------------------------
function View_article_version_details($article_id, $version_id) {

// HTTP method: 	GET
// PATH: 	        /v1/my_data/articles/{article_id}/versions/version_id
// Parameters:      $article_id, $version_id
// Returns:         a json string

		$method = 'GET';
        $data_arr = '';
		$url = $GLOBALS ['fs_main_fig_url'] . 'v1/my_data/articles/' . "$article_id" . '/versions/' . "$version_id";

		$response = Talk_To_Figshare ($method, $url, $data_arr, "3");
		
		return $response;  // json string

}
//-------------------------------------------------------------------------------------------------------
function Make_the_article_public($article_id) {
// HTTP method: 	POST
// PATH: 	        /v1/my_data/articles/{$article_id}/action/make_public
// Parameters:      $article_id


	$method = 'POST';
	$data_arr = '';
	$url = $GLOBALS ['fs_main_fig_url'] .'v1/my_data/articles/'."$article_id".'/action/make_public';
	
	$response = Talk_To_Figshare ($method, $url, $data_arr, "3");

	return $response;

}
//-------------------------------------------------------------------------------------------------------
function Make_the_article_private($article_id) {
// HTTP method: 	POST
// PATH: 	        /v1/my_data/articles/{$article_id}/action/make_private
// Parameters:      $article_id


	$method = 'POST';
	$data_arr = '';
	$url = $GLOBALS ['fs_main_fig_url'] .'v1/my_data/articles/'."$article_id".'/action/make_private';

	$response = Talk_To_Figshare ($method, $url, $data_arr, "3");

	return $response;

}
//-------------------------------------------------------------------------------------------------------
function Talk_To_Figshare ($method, $url, $data, $enc_type) {

//$oauth = new OAuth($fs_consumer_key,$fs_consumer_secret);
$oauth = new OAuth($GLOBALS ['fs_consumer_key'],$GLOBALS ['fs_consumer_secret']);
// $oauth->setToken($fs_access_token,$fs_access_token_secret);
$oauth->setToken($GLOBALS ['fs_access_token'],$GLOBALS ['fs_access_token_secret']);
$OA_header = $oauth->getRequestHeader($method, $url);

// $headers = array("Content-Type: application/json", "Authorization: $OA_header");

switch ($enc_type) {
    case "1":
		$headers = array("Content-Type: application/json", "Authorization: $OA_header");
        break;
    case "2":
        $headers = array("Content-Type: multipart/form-data","Authorization: $OA_header");
        break;
	case "3":
		$headers = array("Authorization: $OA_header");
        break;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
if (isset($data)) {curl_setopt($ch, CURLOPT_POSTFIELDS, $data);}
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch);

return $response;

}
//-------------------------------------------------------------------------------------------------------
function obtain_category_list () {

$cat_list_json =  Talk_To_Figshare ('GET', 'http://api.figshare.com/v1/categories', '');
$cat_list_arr = array();
$cat_list_arr = json_decode($cat_list_json, true);

//echo ($cat_list_arr ['items'][0]['id']);
//echo "\n";
//echo($cat_list_arr ['items'][0]['name']);
//echo "\n";
}
?>