<!--
JONATHANS KOD - I denna filen lägger jag till en div med en lista. Inuti listan hämtar jag a href-värdet från fältet social_url och Font Awesome-ikonen från fältet social_channel.
Hela Social.php är en Option Page i ACF och är skapad genom att använda en repeater (med subfälten innanför denna) för att man ska kunna lägga till hur många man vill. Jag valde att göra den till en option för att lätt kunna hantera sociala medier via adminpanelen, och den ligger i en egen fil för att enkelt kunna användas genom get_template_part på olika sidor.
-->

<?php
if( have_rows('social_media', 'option') ):
	echo '<div class="container soc-div has-text-centered">';
	echo '<ul>';
	while ( have_rows('social_media', 'option') ) : the_row();

		$socialchannel = get_sub_field('social_channel', 'option');
		$socialurl = get_sub_field('social_url', 'option');
		echo '<li>';
		echo '<a href="' . $socialurl . '" target="_blank">';
		echo '<i class="fa fa-' . $socialchannel . '" aria-hidden="true"></i>';
		echo '<span class="hidden">' . ucfirst($socialchannel) . '</span>';
		echo '</a></li>';

	endwhile;
	echo '</ul>';
	echo '</div>';
endif;
?>
