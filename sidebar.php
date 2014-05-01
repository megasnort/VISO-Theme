		</div>		
		
	</div>

	<ul id="aside">
	
		<?php
			if(is_user_logged_in())
			{
				dynamic_sidebar('Logged in only Side bar');	
			}
			
		?>  
	
		<?php dynamic_sidebar('Side bar'); ?>  
	</ul>