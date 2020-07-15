<?php
if(isset($_POST['search']))
{
    $searchQuery=$_POST['searchQuery'];
    $searchArray=explode(" ",$searchQuery,1);
    $maxCount=0;

    while($rows=mysqli_num_rows(mysqli_query($connect,"SELECT * FROM `help`")))
    {
        $HelpInfo=$rows['HelpInfo'];
        $HelpDesc=$rows['HelpDesc'];
        $count1=substr_count($HelpInfo,$searchArray[0])*2;
        $count2=substr_count($HelpInfo,$searchArray[0]);
        $count3=$count1+$count2;
    
        if($count3>maxCount)
        {
            $result1=$rows['HelpId'];
            $result2=$rows['HelpInfo'];
            $result3=$rows['HelpDesc'];
            $maxCount=$count3;
        }
    } 
    if($maxCount==0)
    {
        $HelpInfo="No Results Found";
        $HelpDesc="No Description Available for the given search";
    }  
}
else
{
    $HelpInfo="Search For help in the Search Bar";
    $HelpDesc="The Description for your search will be available here";
}
?>
<div class="row">
    <div class="col text-center">
        <?php echo($HelpInfo)?>
    </div>
</div>
<div class="row">
    <div class="col text-center">
        <?php echo($HelpDesc)?>
    </div>
</div>