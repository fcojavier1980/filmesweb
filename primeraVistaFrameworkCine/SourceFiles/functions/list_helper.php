<?php 
function listado_flex_4col_1action( $header_title, $total_results, $header, $container, $data, $keys_data, $style_data, $data_list_size=null, $action1=null, $action2=null, $action3=null) { ?>
	
	<div class="<?= $container ?>">
		<span class="label-header-full" style="margin-bottom: 6px;"><?= $header_title ?></span><span class="rotulo_low" style="margin-left: 20px;">RESULTADOS:&nbsp<?= $total_results?></span> 
		<div class="header_list" style="margin-top: 6px;">
			<div class="header_inside">
				<?php
				$total_keys = count($keys_data);
				$total_keys_action1 = $total_keys+1;
				$cont = 0;
				foreach ($header as $value) { ?>
				<?php if($value == '&nbsp'){}
					else{?>
						<div id="sort_col_head_<?= $cont ?>" style="display: inline-flex; margin-bottom: 15px; cursor: pointer;"  onclick="sortList_4col_1action(this, 4);">
							<div class="t_col_bold" style="width: <?= $style_data[$cont]?>"><?= $value ?>&nbsp<img src="<?= IMAGES?>icon-abc.png" style="height: 14px; width: 14px;  margin-left: 6px; padding-top: 5px"></div>
						</div>
					<?php } ?>
				<?php 
				$cont++;
				} ?>
			</div>
		</div>
		</br>
		<div class="<?= isset($data_list_size) && $data_list_size == 'low' ? 'data_list_short' : 'data_list' ?>" style="margin-top: 38px;">
		<?php
		$cont_row = 0;
		foreach ($data as $key => $value) { ?>
			<div class="alternate_row_list" id="alternate_row_list_<?= $cont_row ?>">
				<div id="film_id_<?= $value['id'] ?>" style="white-space: nowrap;">	
					<?php
						for($k=0 ; $total_keys > $k ; $k++){ ?>
							<div class="text-data-list sort_col_list_<?= $k ?>" style="display: <?= $k != 4 ? 'inline-flex' : 'none' ?>; width: <?= $style_data[$k]?>;"><?php echo $value[$keys_data[$k]]; ?></div>
						<?php } ?>			
						<?php if(isset($action1)){?>
							<div class="sort_col_list_<?= $total_keys_action1 ?>" style="display: inline-block;">
							<form method='post' action='<?= URLWEB . $action1['url'] . $value['id'] ?>' class="action_data_list">
								<button type='submit' class="btn_action_a"><?= $action1['name'] ?></button>
							</form>
							</div>
						<?php } ?>
					</br>
				</div>
			</div>	
			<?php 
			$cont_row++;
		} ?>
		</div>
	</div>
<?php } 

function listado_flex_5col_1action( $header_title, $total_results, $header, $container, $data, $keys_data, $style_data, $data_list_size=null, $action1=null, $action2=null, $action3=null) { 

	?>
	
	<div class="<?= $container ?>">
		<span class="label-header-full" style="margin-bottom: 6px;"><?= $header_title ?></span><span class="rotulo_low" style="margin-left: 20px;">RESULTADOS:&nbsp<?= $total_results?></span> 
		<div class="header_list_sub" style="margin-top: 6px;">
			<div class="header_inside">
				<?php
				$total_keys = count($keys_data);
				$total_keys_action1 = $total_keys+1;
				$cont = 0;
				foreach ($header as $value) { ?>
				<?php if($value == '&nbsp'){}
					else{?>
						<div id="sort_col_head_<?= $cont ?>" style="display: inline-flex; margin-bottom: 15px; cursor: pointer;"  onclick="sortList_5col_1action(this, 5);">
							<div class="t_col_bold" style="width: <?= $style_data[$cont]?>"><?= $value ?>&nbsp<img src="<?= IMAGES?>icon-abc.png" style="height: 14px; width: 14px;  margin-left: 6px; padding-top: 5px"></div>
						</div>
					<?php } ?>
				<?php 
				$cont++;
				} ?>
			</div>
		</div>
		</br>
		<div class="<?= isset($data_list_size) && $data_list_size == 'low' ? 'data_list_short' : 'data_list' ?>" style="margin-top: 38px;">
		<?php
		$cont_row = 0;
		foreach ($data as $key => $value) {?>
			<div class="alternate_row_list" id="alternate_row_list_<?= $cont_row ?>">
				<div id="film_id_<?= $value['id'] ?>" style="white-space: nowrap;">	
					<?php
						for($k=0 ; $total_keys > $k ; $k++){ ?>
							<div class="text-data-list sort_col_list_<?= $k ?>" style="display: <?= $k != 5 ? 'inline-flex' : 'none' ?>; width: <?= $style_data[$k]?>;"><?php echo $value[$keys_data[$k]] == $value['created_at'] ? substr($value[$keys_data[$k]] , 0, -8) : $value[$keys_data[$k]] ;?></div>
						<?php } ?>			
						<?php if(isset($action1)){?>
							<div class="sort_col_list_<?= $total_keys_action1 ?>" style="display: inline-block;">
							<form method='post' action='<?= URLWEB . $action1['url'] . $value['id'] ?>' class="action_data_list">
								<button type='submit' class="btn_action_a"><?= $action1['name'] ?></button>
							</form>
							</div>
						<?php } ?>
					</br>
				</div>
			</div>	
			<?php 
			$cont_row++;
		} ?>
		</div>
	</div>
<?php } 

function list_flex_2col_1action( $header_title, $total_results, $header, $container, $data, $keys_data, $style_data, $data_list_size=null, $action1=null, $action2=null, $action3=null) { ?>
	
	<div class="<?= $container ?>">
		<span class="label-header" style="margin-bottom: 6px;"><?= $header_title ?></span><span class="rotulo_low" style="margin-left: 20px;">RESULTADOS:&nbsp<?= $total_results?></span> 
		<div class="header_list_sub">
			<div class="header_inside">
				<?php
				$total_keys = count($keys_data);
				$total_keys_action1 = $total_keys+1;
				$cont = 0;
				foreach ($header as $value) { ?>
				<?php if($value == '&nbsp'){}
					else{?>
						<div id="sort_col_head_<?= $cont ?>" style="display: inline-flex; margin-bottom: 15px; cursor: pointer;"  <?= $value == 'Reparto' ? '' :'onclick="sortList_2col_1action(this, 2);"' ?>>
							<div class="t_col_bold" style="width: <?= $style_data[$cont]?>"><?= $value ?>&nbsp<img src="<?= IMAGES?>icon-abc.png" style="height: <?= $value == 'Reparto' ? '0px' :'14px' ?>; width: 14px;  margin-left: 6px; padding-top: 5px"></div>
						</div>
					<?php } ?>
				<?php 
				$cont++;
				} ?>
			</div>
		</div>
		</br>
		<div class="<?= isset($data_list_size) && $data_list_size == 'low' ? 'data_list_short' : 'data_list' ?>" style="margin-top: 32px;">
		<?php
		$cont_row = 0;
		foreach ($data as $key => $value) { ?>
			<div class="alternate_row_list" id="alternate_row_list_<?= $cont_row ?>">
				<div id="film_id_<?= $value['id'] ?>">	
					<?php
						for($k=0 ; $total_keys > $k ; $k++){ ?>
							<div class="text-data-list sort_col_list_<?= $k ?>" style="display: <?= $k != 2 ? 'inline-block' : 'none' ?>; width: <?= $style_data[$k]?>;"><?php echo $value[$keys_data[$k]]; ?></div>
						<?php } ?>			
						<?php if(isset($action1)){?>
							<div class="sort_col_list_<?= $total_keys_action1 ?>" style="display: inline-block;">
							<form method='post' action='<?= URLWEB . $action1['url'] . $value['id'] ?>' class="action_data_list">
								<button type='submit' class="btn_action_a"><?= $action1['name'] ?></button>
							</form>
							</div>
						<?php } ?>
					</br>
				</div>
			</div>	
			<?php 
			$cont_row++;
		} ?>
		</div>
	</div>
<?php } ?>


