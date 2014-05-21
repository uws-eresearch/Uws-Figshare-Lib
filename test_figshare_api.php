<?php

require 'Figshare_api.php';  // The actual Figshare Lib.

// Actions summary..

$action =$_POST['ft_action'];
$title = $_POST['ft_title'];
$description = $_POST['ft_description'];
$type =$_POST['ft_type'];
// Figure, Media, Dataset, Poster, Paper, Thesis, Code, Presentation or Fileset
// See figshare.com/article_types
$article_id = $_POST['ft_article_id'];
$cat_number = $_POST['ft_cat_number'];
$tag_name = $_POST['ft_tag_name'];
$link_addr = $_POST['ft_link_addr'];
$author = $_POST['ft_author'];
$author_id =$_POST['ft_author_id'];
$file_path = $_POST['ft_file_path'];
$version_id = $_POST['ft_version'];


/*
$action = "K";
$title ="test 6";
$description = "Test 6 Description";
$type =""; // Figure, Media, Dataset, Poster, Paper, Thesis, Code, Presentation or Fileset
// //See figshare.com/article_types
$article_id = '960162';
$cat_number = '';
$tag_name = '';
$author = '';
$auther_id ='';
$file_path = '';
$version_id = '';
*/

/*
A = Create_an_Article($title, $description, $type)
B = Update_Article ($title, $description, $type, $article_id)
C = Delete_Article ($article_id)
D = Add_Category_to_Article($article_id, $cat_number)
E = Add_Tags_to_Article ($article_id, $tag_name)
F = Add_links_to_Article($article_id, $tag_name)
G = Search_for_an_author ($author)
H = Create_new_author ($author)
I = Add_authors_to_article ($article_id, $author_id)
J = Upload_file_to_article ($article_id, $file_path)
K = Check_the_article_details($article_id)
L = View_article_versions($article_id)
M = View_article_version_details($article_id, $version_id)
N = Make_the_article_public($article_id)
O = Make_the_article_private($article_id)
 

Z = obtain_category_list ()

*/

// The current category lists can be obtained fropm http://api.figshare.com/v1/categories
// This is also not in the doco.
//------------------------------------------------------------------------------

 switch ($action) {
    case "A":
        echo "Selected-->A \n || Title-->$title<---\n || Description-->$description<-- \n";
		echo "|| Type--->$type<---";
//		$title = 'GD Test dataset 2';
//		$description = 'Test description 2';
//		$type = 'dataset';
		$response = Create_an_Article($title, $description, $type);
		echo "Figshare Returned --> $response";  // json format.
        break;
    case "B":
        echo "Selected B --> Update Article \n\n\n";
//		$title = 'GD Test dataset 2b';
//		$description = 'Test description 2b';
//		$type = 'dataset'; // types can be "dataset', 'figure', 'media', 'poster', 'paper', 'thesis', 'code', 'presentation', 'fileset'
		$response = Update_Article ($title, $description, $type, $article_id);
		echo $response;
        break;
	case "C":
	    echo "Selected C -> Delete Article \n\n\n";
		$response = Delete_Article ($article_id);
		echo $response;
        break;
	case "D":
	    echo "Selected D -> Add Category Cat is -->$cat_number<--";
//		$cat_number = "76";
		$response = Add_Category_to_Article($article_id, $cat_number);
		echo $response;
        break;
	case "E":
	    echo "Selected E -> Add Tags \n\n\n";
//		$tag_name = "Tag_1";
		$response = Add_Tags_to_Article($article_id, $tag_name);
		echo $response;
        break;
	case "F":
	    echo "Selected F -> Add links \n\n\n";
//		$tag_name = "Tag_1";
		$response = Add_links_to_Article($article_id, $link_addr);
		echo $response;
        break;
	case "G":
	    echo "Selected G -> Search for an Author \n\n\n";
		$author = "Graham ";
		$response = Search_for_an_author ($author);
		echo $response;
        break;
	case "H":
	    echo "Selected H -> Creat a new Author \n\n\n";
//		$author = "ALF Leahey";
		$response = Create_new_author ($author);
		echo $response;
	    break;
	case "I":
	    echo "Selected I -> Add authors to an article \n\n\n";
//		$author = "ALF Leahey";
		$response = Add_authors_to_article ($article_id, $author_id);
		echo $response;
	    break;
	case "J":
	    echo "Selected J -> Upload file to article \n\n\n";
//		$article_id = "";
//		$file_path = "";
		echo "File path before call -->$file_path<--";
		$response = Upload_file_to_article ($article_id, $file_path);
		echo $response;
	    break;
	case "K":
	    echo "Selected K -> Check the article details \n\n\n";
		$response = Check_the_article_details($article_id);
		echo $response;
	    break;
	case "L":
	    echo "Selected L -> View article versions \n\n\n";
		$response = View_article_versions($article_id);
		echo $response;
	    break;
	case "M":
	    echo "Selected M -> View article version details \n\n\n";
		$response = View_article_version_details($article_id, $version_id);
		echo $response;
	    break;
	case "N":
	    echo "Selected N -> Make the article public \n\n\n";
		$response = Make_the_article_public($article_id);
		echo $response;
	    break;
	case "O":
	    echo "Selected O -> Make the article private \n\n\n";
		$response = Make_the_article_private($article_id);
		echo $response;
	    break;
    case "Z":
        echo "Selected Z -> Obtain the category list";
		$response = obtain_category_list ();
		echo $response;
        break;
		
		echo 'return to <a href = "form_test.html"> Back to Form </a>';
}
//----------------------------------------------------------------------------------
// END TESTING AREA//
?>