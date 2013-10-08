<?php

				$menuItems = wp_get_nav_menu_items('New Main Navigation'); // Add your menu name here.
				if ($menuItems && isset($post->ID) ):
					// loop through menu items
					foreach($menuItems as $menuItem) :
						// if the menu item ID matches the current post ID = current page
						if($menuItem->object_id == $post->ID){
							//if the current menu item has a parent = sub level nav item
							if($menuItem->menu_item_parent != 0){
								//set the variable to the parent menu item ID so we can display siblings
								$childrenof = $menuItem->menu_item_parent;
							} else {
								//set the variable to the current list item ID so we can find the children
								$childrenof = $menuItem->db_id;
								$isParent = true;
							}
						}

					endforeach;
					?>
					<?php if(isset($childrenof)): // if this page is in the menu?>
						<ul>
							<?php foreach($menuItems as $menuItem): // loop through the menu?>
								<?php if($menuItem->menu_item_parent == $childrenof): // if the item has the same parent as it's sibling.. OR if it is a sub page of a top level item ?>

										<?php if($menuItem->object_id == $post->ID): // if it is the current page ?>
											<li class="current-menu-item">
										<?php else: ?>
											<li>
										<?php endif; ?>

										<a href="<?php echo $menuItem->url ; ?>">
											<?php echo $menuItem->title; ?>
										</a>
									</li>

								<?php endif; ?>
							<?php endforeach; ?>

	     				</ul>
						<?php endif; ?>

				<?php endif; ?>