<?php

function userban($user)
{
include("banuser.php");

if(!empty($userbanned))
{
for($i=0; $i<=(count($userbanned)-1); $i++)
{
if($user==$userbanned[$i])
return 1;

}


return 0;
}
}

function postban($user, $post)
{
include("banpost.php");

if(!empty($userban) && (!empty($postban)))
{
for($i=0; $i<=(count($userban)-1); $i++)
{
if($user==$userban[$i] && $post==$postban[$i])
return 1;
}
return 0;
}
}


function showpost($discussion)
{
echo '  <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title"><a href="core.php?type=post&author='.$discussion['author'].'&permlink='.$discussion['permlink'].'">'.$discussion['author'].'</a></h3>
    </div>
    <div class="panel-body">
    <div class="center-block">';
echo strip_tags(nl2br($discussion['body']), '<br>'); //* todo: fixed a "< >" bug *//

echo '<center><hr>'.str_replace("SBD", "USD", $discussion['pending_payout_value']).'<br><script type="text/javascript">document.write(votebutton("'.$discussion["author"].'","'.$discussion["permlink"].'","2000"));</script></center>';

echo '</div></div></div>';


}

?>
