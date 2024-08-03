<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JBTW24
 */

?>
<?php
$main_menu = wp_get_nav_menu_items('main-menu');
$main_menu_item = [];
if (ofsize($main_menu) > 0) {
	foreach ($main_menu as $key => $v) {
		$item_id = $v->ID;
		$parent_id = $v->menu_item_parent;
		$main_menu_item[$item_id] = array(
			"level" => -1,
			"title" => $v->title,
			"url" => $v->url,
			"ID" => $item_id,
			"key" => $key,
			"parent" => $parent_id,
			"has_parent" => false,
			"child" => [],
			"has_child" => false,
			"class" => implode(' ', $v->classes),
			"target" => $v->target
		);
		if ($post->ID == $v->object_id) $main_menu_item[$item_id]['class'] .= ' -active';
		if ($v->menu_item_parent == 0) {
			$main_menu_item[$item_id]["level"] = 0;
		} else {
			if ($main_menu_item[$parent_id]["parent"] == 0) {
				$main_menu_item[$item_id]["level"] = 1;
			} else if ($main_menu_item[$main_menu_item[$parent_id]["parent"]]["parent"] == 0) {
				$main_menu_item[$item_id]["level"] = 2;
			}
			array_push($main_menu_item[$parent_id]["child"], $item_id);
			if (!$main_menu_item[$parent_id]["has_child"]) {
				$main_menu_item[$parent_id]["has_child"] = true;
				$main_menu_item[$parent_id]["class"] .= ' -has-child';
			}

			$main_menu_item[$item_id]["has_parent"] = true;
			if (!$main_menu_item[$item_id]["has_parent"]) {
				$main_menu_item[$item_id]["has_parent"] = true;
				$main_menu_item[$item_id]['class'] .= ' -has-parent';
			}
		}
	}
}


?>
<!-- ========== HEADER ========== -->
<header id="masthead" class="main-menu-masthead bg-white border-b border-gray-200">
	<nav class="main-menu-inner" id="site-navigation" aria-label="<?php esc_attr_e('Main Navigation', 'jbtw24'); ?>">
		<div class="flex justify-between items-center gap-x-1">

			<?php
			if (is_front_page()) :
			?>
				<h1>
					<a class="flex-none font-semibold text-xl text-primary focus:outline-none focus:opacity-80" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
				</h1>
			<?php
			else :
			?>
				<p>
					<a class="flex-none font-semibold text-xl text-primary focus:outline-none focus:opacity-80" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
				</p>
			<?php
			endif;
			?>

			<!-- Collapse Button -->
			<button type="button" class="hs-collapse-toggle md:hidden relative size-9 flex justify-center items-center font-medium text-[12px] rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" id="hs-header-base-collapse" aria-expanded="-1" onclick="this.ariaExpanded *= -1" aria-controls="hs-header-base" aria-label="Toggle navigation" data-hs-collapse="#hs-header-base">
				<svg class="hs-collapse-open:hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<line x1="3" x2="21" y1="6" y2="6" />
					<line x1="3" x2="21" y1="12" y2="12" />
					<line x1="3" x2="21" y1="18" y2="18" />
				</svg>
				<svg class="hs-collapse-open:block shrink-0 hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<path d="M18 6 6 18" />
					<path d="m6 6 12 12" />
				</svg>
				<span class="sr-only">Toggle navigation</span>
			</button>
			<!-- End Collapse Button -->
		</div>

		<!-- Collapse -->
		<div id="hs-header-base" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block " aria-labelledby="hs-header-base-collapse">
			<div class="overflow-hidden overflow-y-auto max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
				<div class="py-2 md:py-0  flex flex-col md:flex-row md:items-center gap-0.5 md:gap-1">
					<div class="grow">
						<div class="flex flex-col md:flex-row md:justify-end md:items-center gap-0.5 md:gap-1">
							<!-- Dropdown -->
							<?php
							foreach ($main_menu_item as $key => $v) {
								if ($v['level'] == 0) {
									if (!$v['has_child']) { ?>
										<a id="main_menu_item_<?= $key ?>" class="<?= $v['class'] ?> main-menu-item" href="<?= $v['url'] ?>" target="<?= $v['target'] ?>">
											<?= $v['title'] ?>
										</a>
									<?php
									} else {
									?>
										<!-- Dropdown -->
										<div id="main_menu_item_<?= $key ?>" class="main-menu-dropdown" aria-expanded="-1" onmouseenter="this.ariaExpanded = 1" onmouseleave="this.ariaExpanded = -1">
											<button id="main_menu_item_<?= $key ?>_toggle" type="button" class="main-menu-dropdown-toggle" onclick="this.parentElement.ariaExpanded *= -1" aria-haspopup="menu" aria-label="<?= $v['title'] ?>">
												<?= $v['title'] ?>
												<svg class="duration-300 shrink-0 size-4 ms-auto md:ms-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
													<path d="m6 9 6 6 6-6" />
												</svg>
											</button>

											<div class="main-menu-dropdown-list" role="menu">
												<div class="py-1 md:px-1 space-y-0.5">

													<?php
													foreach ($v['child'] as $ci => $ckey) {
														$c = $main_menu_item[$ckey];
														if (!$c['has_child']) {
													?>
															<a id="main_menu_item_<?= $ckey ?>" class="<?= $c['class'] ?> main-menu-dropdown-list-item" href="<?= $c['url'] ?>" target="<?= $c['target'] ?>">
																<?= $c['title'] ?>
															</a>
														<?php
														} else {
														?>
															<div id="main_menu_item_<?= $ckey ?>" class="main-menu-dropdown-2" aria-expanded="-1" onmouseenter="this.ariaExpanded = 1" onmouseleave="this.ariaExpanded = -1">
																<button id="main_menu_item_<?= $ckey ?>_toggle" type="button" class="main-menu-dropdown-toggle-2" onclick="this.parentElement.ariaExpanded *= -1">
																	<?= $c['title'] ?>
																	<svg class="md:-rotate-90 duration-300 ms-auto shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
																		<path d="m6 9 6 6 6-6" />
																	</svg>
																</button>

																<div class="main-menu-dropdown-list-2" role="menu" aria-orientation="vertical">
																	<div class="p-1 space-y-1">
																		<?php
																		foreach ($c['child'] as $gci => $gckey) {
																			$gc = $main_menu_item[$gckey];
																		?>
																			<a id="main_menu_item_<?= $gckey ?>" class="<?= $gc['class'] ?> main-menu-dropdown-list-item" href="<?= $gc['url'] ?>" target="<?= $gc['target'] ?>">
																				<?= $gc['title'] ?>
																			</a>
																		<?php
																		}
																		?>
																	</div>
																</div>
															</div>
													<?php
														}
													}

													?>


												</div>
											</div>
										</div>
										<!-- End Dropdown -->
							<?php
									}
								}
							}
							?>
						</div>
					</div>

					<div class="my-2 md:my-0 md:mx-2">
						<div class="w-full h-px md:w-px md:h-4 bg-gray-100 md:bg-gray-300"></div>
					</div>

					<!-- Button Group -->
					<div class=" flex flex-wrap items-center gap-x-1.5">
						<!-- <a class="py-[7px] px-2.5 inline-flex items-center font-medium text-sm rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100" href="#">
              Sign in
          </a> -->
						<a class="py-2 px-2.5 inline-flex items-center font-medium text-sm rounded-lg bg-orange-500 text-white hover:bg-orange-600 focus:outline-none focus:bg-orange-600 disabled:opacity-50 disabled:pointer-events-none" href="#">
							Sign in
						</a>
					</div>
					<!-- End Button Group -->
				</div>
			</div>
		</div>
		<!-- End Collapse -->
	</nav><!-- #site-navigation -->
</header>
<!-- ========== END HEADER ========== -->

<?php
// wp_nav_menu(
// 	array(
// 		'theme_location' => 'menu-1',
// 		'menu_id'        => 'primary-menu',
// 		'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
// 	)
// );
?>