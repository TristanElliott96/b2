<?php /* These first lines are the first part of a Caf�Log template.
         In every template you do, you got to copy them before the Caf�Log 'loop' */
$blog=1; // enter your blog's ID
include ("blog.header.php");
Header("Content-type: text/xml");
if (!isset($rss_language)) { $rss_language = 'en'; }
?><?php echo "<?xml version=\"1.0\"?".">\n"; ?>
<!-- generator="b2/<?php echo $b2_version ?>" -->
<rss version="0.92">
	<channel>
		<title><?php bloginfo_rss("name") ?></title>
		<link><?php bloginfo_rss("url") ?></link>
		<description><?php bloginfo_rss("description") ?></description>
		<lastBuildDate><?php echo gmdate("D, d M Y H:i:s"); ?> GMT</lastBuildDate>
		<docs>http://backend.userland.com/rss092</docs>
		<managingEditor><?php echo $admin_email ?></managingEditor>
		<webMaster><?php echo $admin_email ?></webMaster>
		<language><?php echo $rss_language ?></language>

<?php while($row = mysql_fetch_object($result)) { start_b2(); ?>
		<item>
				<title><?php the_title_rss() ?></title><?php
// we might use this in the future, but not now, that's why it's commented in PHP
// so that it doesn't appear at all in the RSS
//				echo "<category>"; the_category_unicode(); echo "</category>"; ?>
				<description><?php the_content_rss() ?></description>
				<link><?php permalink_single_rss() ?></link>
		</item>
<?php } ?>

	</channel>
</rss>