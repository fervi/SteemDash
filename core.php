<?php
include ('header.php');
include ('libs/autoload.php');
include ('functions.php');

$steem = new \SteemPHP\SteemArticle('https://steemd.steemit.com') or die;
if(!empty($_GET['type'])) {
if($_GET['type']=="created") { 
$discussions = $steem->getDiscussionsByCreated($tag, $limit) or die; } else if ($_GET['type']=="hot")
{$discussions = $steem->getDiscussionsByHot($tag, $limit) or die; } else if ($_GET['type']=="trending")
{ $discussions = $steem->getDiscussionsByTrending($tag, $limit) or die; }
else if ((!empty($_GET['type'])=="post") && (isset($_GET['author']) && (isset($_GET['permlink']))))
{
$author = $_GET['author'];
$permlink = $_GET['permlink'];
$discussion = $steem->getContent($author, $permlink);
}
} else { die; }

if((empty($author)) and (empty($permlink)))
{
foreach($discussions as $discussion)
{
if(postban($discussion['author'], $discussion['permlink'])==0)
{

if(userban($discussion['author'])==0)
{

showpost($discussion);

}
}
}

} // end empty author
else
{
showpost($discussion);
} // else empty author


include ('footer.php');
?>

