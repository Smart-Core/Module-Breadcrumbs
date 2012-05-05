<?php

$cnt = count($this->Items);

if ($cnt > 1 or $this->hide_if_only_home == false) {
	foreach ($this->Items as $key => $item) {
		echo --$cnt ? "<a href=\"{$item['uri']}\" title=\"{$item['descr']}\">" : '';
		echo $item['title'];
		echo $cnt ? "</a>&nbsp;{$this->delimiter}&nbsp;" : '';
	}
}
