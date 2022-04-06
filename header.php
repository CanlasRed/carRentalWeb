<?php include 'php/connection.php'; ?>
<!-- CSS -->

<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/car-list.css">

<!-- SEMANTIC UI -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.css">

<!-- BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<!-- SLICK SLIDER -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

<!-- FONTAWESOME -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css">

<!-- BOXICONS -->
<script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>

<link rel="icon" type="icon" href="favicon.ico">

<?php
date_default_timezone_set('Asia/Hong_Kong');
function get_time_ago( $time )
{
	$time_difference = time() - $time;

	if( $time_difference < 1 ) { return 'Just Now'; }


	$condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
		30 * 24 * 60 * 60       =>  'month',
		24 * 60 * 60            =>  'day',
		60 * 60                 =>  'hour',
		60                      =>  'minute',
		1                       =>  'second'
	);

	foreach( $condition as $secs => $str )
	{
		$d = $time_difference / $secs;

		if( $d >= 1 )
		{
			$t = round( $d );
			return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
		}
	}
}
?>




