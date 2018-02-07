<?php namespace System\Modules\Tag;

function listTags(\Web $w, $params = []) {
	
	if (empty($params['object'])) {
		return;
	}
	
	$w->enqueueStyle(['name' => 'selectize-css', 'uri' => '/system/modules/tag/assets/lib/selectize.js/dist/css/selectize.css', 'weight' => 300]);
	$w->enqueueScript(['name' => 'selectize-js', 'uri' => '/system/modules/tag/assets/lib/selectize.js/dist/js/standalone/selectize.js', 'weight' => 300]);
	
	\VueComponentRegister::registerComponent('ajax-modal', new \VueComponent('ajax-modal', '/system/templates/vue-components/ajax-modal.vue.js'));
	\VueComponentRegister::registerComponent('tag', new \VueComponent('tag', '/system/modules/tag/assets/js/tag.vue.js', '/system/modules/tag/assets/css/style.css'));

	$w->ctx('object', $params['object']);
	
	// Filter tags into a displayable group and a group that only shows on hover
	$tags = $w->Tag->getTagsByObject($params['object']);
	$filtered_tags = ['display' => [], 'hover' => []];
	
	$tag_str_len = 0;
	if (!empty($tags)) {
		foreach($tags as $tag) {
			if ($tag_str_len < 10) {
				$filtered_tags['display'][] = ['id' => $tag->id, 'tag' => $tag->tag];
			} else {
				$filtered_tags['hover'][] = ['id' => $tag->id, 'tag' => $tag->tag];
			}
			
			$tag_str_len += strlen($tag->tag);
		}
	}
	
	$w->ctx('tags', $filtered_tags);
}
