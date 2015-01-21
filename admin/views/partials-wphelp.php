<?php
/**
This is the page that displays the videos. It is partial HTML and partial PHP.
*/
echo "<h1>" . __( 'Video Tutorials for using WordPress', 'menu-test' ) . "</h1>";

// Put all the YouTube video IDs and their titles into an array to cut down on code
$vids = array(
						'Create a Blog Post' 						=> 	'vX0DMAjtZZg',
						'Adding Media to a Post'				=>	'r917umf59Ko',
						'Adding a Gallery to Post'				=>	'8O0swHbEdVU',
						'Formatting & Styling Post'				=>	'16tsnxTxhOc',
						'Blog Comments'							=>	'C7q8O0KEjzE',
						'Categories & Tags'						=>	'_ECoD39Yhsw',
						'Managing Blog Users'					=>	'vdsx3UvTL3I'
						);
?>
<div id="wplg"> 
<p style="font-size:16px">
Below are some videos to help you with WordPress. Thank you for using <a href="http://ilocalbusiness.net">iLocal Business Website Services.</a></p>
<?php 
// Loop thru the $vids array and Print the title and use the URL to embed video
foreach($vids as $key => $index) {
?>   
		<div class="wplg-video">
		<h1><?php echo $key; // Make the title an H1 heading ?></h1> 
		<iframe width="412" height="309" src="//www.youtube.com/embed/<?php echo $index; // use the URL as a src for embeded video?>" frameborder="0" allowfullscreen></iframe>	
		</div> 
<?php } // end foreach
 ?> <div class="wplg-clear"></div>